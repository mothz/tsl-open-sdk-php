<?php

namespace com\tsl3060\open\sdk;

use com\tsl3060\open\sdk\exception\BadResourceException;
use com\tsl3060\open\sdk\exception\UnknownResourceException;
use com\tsl3060\open\sdk\objs\TanSiLuLoginPayload;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindPayload;
use com\tsl3060\open\sdk\objs\TanSiLuRegisterPayload;
use com\tsl3060\open\sdk\objs\TanSiLuSmsSendPayload;
use com\tsl3060\open\sdk\objs\TanSiLuVideoCompressedPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbonPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQueryPayload;
use com\tsl3060\open\sdk\router\NotifyMapRouter;
use com\tsl3060\open\sdk\secure\RSASecure;
use com\tsl3060\open\sdk\secure\SecureTool;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use MongoDB\BSON\ObjectId;
use RuntimeException;

/**
 * OpenAPI SDK
 */
class ApiClient
{

    private Config $config;

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }


    private ?SecureTool $secureTool = null;


    public function __construct()
    {
        //时间设置为东八区
        date_default_timezone_set('Asia/Shanghai');

    }

    /**
     * @return SecureTool
     */
    public function getSecureTool(): SecureTool
    {
        if ($this->secureTool == null) {
            $this->secureTool = new SecureTool($this->config);
        }
        return $this->secureTool;
    }

    private ?Client $client = null;

    private function getClient(): Client
    {
        if (!$this->client) {
            $jar = new CookieJar();
            $this->client = new Client([
                'base_uri' => $this->config->getHost(),
                'connect_timeout' => 5,
                'debug' => $this->config->isDebug(),
                'cookies' => $jar,
                'read_timeout' => 5,
                'timeout' => 5
            ]);
        }
        return $this->client;
    }

    /**
     * 执行请求
     * @param IApiRequest $request
     * @return ApiResponse|null
     * @throws GuzzleException
     */
    public function requestPayload(IApiRequest $request): ?ApiResponse
    {
        $apiRequest = $this->pack($request->path(), $request);
        return $this->request($apiRequest);
    }

    private function pack(string $path, object $data): ApiRequest
    {
        $apiRequest = new ApiRequest();
        $apiRequest->setPath($path);
        $apiRequest->setCharset($this->config->getCharset());
        $apiRequest->setTime(date($this->config->getDateFormat()));
        $apiRequest->setSignType($this->config->getSignType());
        $apiRequest->setPayload($data);
        $apiRequest->setAccessToken("");
        $apiRequest->setAppId($this->config->getAppId());
        return $apiRequest;
    }

    /**
     * 接口请求
     * @param ApiRequest $apiRequest
     * @return ApiResponse
     * @throws GuzzleException
     */
    public function request(ApiRequest $apiRequest): ?ApiResponse
    {
        $apiRequest->setTime(date($this->config->getDateFormat()));
        $apiRequest->setAppId($this->config->getAppId());
        if ($apiRequest->getCharset() == null) {
            $apiRequest->setCharset($this->config->getCharset());
        }
        if ($apiRequest->getSignType() == null) {
            $apiRequest->setSignType($this->config->getSignType());
        }

        $iSecure = $this->getSecureTool()->getSecure($apiRequest->getSignType());
        if ($iSecure == null) {
            return null;
        }

        $sign = $iSecure->requestSign($apiRequest);
        if (!$sign) {
            return null;
        }
        $this->log('签名 %s', $sign);
        $apiRequest->setSign($sign);

        //执行请求
        $client = $this->getClient();

        $response = $client->post($apiRequest->getPath(), [
            'json' => [
                'app_id' => $apiRequest->getAppId(),
                'path' => $apiRequest->getPath(),
                'access_token' => $apiRequest->getAccessToken(),
                'sign' => $apiRequest->getSign(),
                'sign_type' => $apiRequest->getSignType(),
                'charset' => $apiRequest->getCharset(),
                'time' => $apiRequest->getTime(),
                'payload' => $apiRequest->getPayload()
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            //验证签名
            $dResponse = json_decode($body);

            $apiResponse = new ApiResponse();
            //{"time":"2023-07-10 10:53:55","openid":"","sign":"","charset":"UTF-8","response_id":"64ab72c3ffe966ac14cf2ec5",
            //"err_code":1000,"err_msg":"success","sub_err":2000,"sub_msg":"success","sign_type":"RSA"}
            $apiResponse->setResponseId($dResponse->response_id);
            $apiResponse->setTime($dResponse->time);
            $apiResponse->setOpenId($dResponse->openid);
            $apiResponse->setSign($dResponse->sign);
            $apiResponse->setCharset($dResponse->charset);
            $apiResponse->setErrCode($dResponse->err_code);
            $apiResponse->setErrMsg($dResponse->err_msg);
            $apiResponse->setSubErr($dResponse->sub_err);
            $apiResponse->setSubMsg($dResponse->sub_msg);
            $apiResponse->setSignType($dResponse->sign_type);
            $apiResponse->setPayload(empty($dResponse->payload) ? null : $dResponse->payload);
            $apiResponse->setDescription($dResponse->description);

            $this->log($body);
            $iSecure = $this->getSecureTool()->getSecure($apiResponse->getSignType());
            if (!$iSecure) {
                $this->log("没有找到签名工具");
            }
            if ($iSecure->verifyResponse($apiResponse)) {
                return $apiResponse;
            } else {
                $this->log("回调验签失败");
                return null;
            }
        }
        return null;

    }


    private function log($format, ...$args)
    {
        $bu = sprintf($format, ...$args);
        file_put_contents('php://stdout', $bu . "\r\n");
    }


    /**
     * 异步通知签名校验
     * @param NotifyRequest $notifyRequest
     * @return bool
     */
    public function verifyNotify(NotifyRequest $notifyRequest): bool
    {
        $iSecure = $this->getSecureTool()->getSecure($notifyRequest->getSignType());
        if ($iSecure == null) {
            return false;
        }
        return $iSecure->verifyNotify($notifyRequest);
    }


    private ?INotifyListener $notifyListener = null;

    /**
     * @return INotifyListener
     */
    public function getNotifyListener(): ?INotifyListener
    {
        return $this->notifyListener;
    }

    /**
     * @param INotifyListener $notifyListener
     */
    public function setNotifyListener(INotifyListener $notifyListener): void
    {
        $this->notifyListener = $notifyListener;
    }

    public const RESULT_OK = "ok";
    public const RESULT_FAIL = "fail";

    private ?NotifyMapRouter $notifyMapRouter=null;

    /**
     * @param string $contentType
     * @param string $raw 接收的内容
     * @return NotifyResponse
     * @throws UnknownResourceException
     * @throws BadResourceException|exception\ExecuteException
     */
    public function notifyRun(string $contentType, string $raw): NotifyResponse
    {
        if ($this->notifyMapRouter == null) {
            $this->notifyMapRouter = new NotifyMapRouter($this->notifyListener);
        }
        $notify = new NotifyRequest();
        //解析
        if (strpos($contentType, 'json') > 0) {
            if (!$notify->loadFormJSON($raw)) {
                throw new BadResourceException("数据格式不是有效的JSON格式");
            }

        } //TODO 其它格式处理在此添加
        else {
            throw new UnknownResourceException("未知的数据格式");
        }

        //验证签名
        $result = $this->verifyNotify($notify);
        if (!$result) {
            throw new BadResourceException("无效的签名信息");
        }
        $listener = $this->getNotifyListener();
        if (!$listener) {
            throw new BadResourceException("没有设置监听");
        }
        //验证通过
        $resp = new NotifyResponse();
        $resp->setAnswerId($notify->getNotifyId());
        $resp->setAppId($this->config->getAppId());
        $resp->setTime(date($this->config->getDateFormat()));
        $resp->setSignType(RSASecure::NAME);
        $resp->setCharset($this->config->getCharset());

        $requestPayload = $notify->getPayload();

        $notifyRouter = $this->notifyMapRouter->get($notify->getModule());
        if ($notifyRouter != null) {
            try {
                $tanResult = $notifyRouter->makeBody($requestPayload);
                $resp->setPayload($tanResult);
                $resp->setResult(self::RESULT_OK);
            } catch (exception\ExecuteException $exception) {
                $resp->setResult(self::RESULT_FAIL);
            }

        } else {
            $resp->setResult(self::RESULT_FAIL);
        }

        //对数据签名
        $is = $this->getSecureTool()->getSecure($resp->getSignType());
        $str = $is->notifyAnswerSign($resp);

        $resp->setSign($str);

        return $resp;
    }
}

/**
 *
//分发
switch ($notify->getModule()) {
case "/v1/captcha/sms":
$payload = new TanSiLuSmsSendPayload();
$payload->setDevice($requestPayload->device ?? '');
$payload->setPhone($requestPayload->phone);
$payload->setIp($requestPayload->ip ?? '');
$payload->setEvent($requestPayload->event);
try {
$tanSendResult = $listener->sms($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanSendResult);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}

break;
case "/v1/account/register":
//注册请求
$payload = new TanSiLuRegisterPayload();
$payload->setIp($requestPayload->ip ?? '');
$payload->setPhone($requestPayload->phone);
$payload->setSms($requestPayload->sms);
$payload->setForm($requestPayload->form ?? '');
$payload->setDevice($requestPayload->device ?? '');
try {
$tanRegisterResult = $listener->register($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanRegisterResult);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}
break;
case "/v1/account/openid":
//账号绑定
$payload = new TanSiLuOpenidBindPayload();
$payload->setOpenid($requestPayload->openid);
$payload->setType($requestPayload->type);
$payload->setAccount($requestPayload->account);

try {
$tanBindResult = $listener->openid($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanBindResult);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}
break;
case "/v1/account/login":
//账号登录
$payload = new TanSiLuLoginPayload();
$payload->setAccount($requestPayload->account);
$payload->setSms($requestPayload->sms);
$payload->setOpenid($requestPayload->openid);
$payload->setType($requestPayload->type);

try {
$tanLogin = $listener->login($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanLogin);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}
break;
case '/v1/wallet/query':
$payload = new TanSiLuWalletQueryPayload();
$payload->setOpenid($requestPayload->openid);
$payload->setToken($requestPayload->token);
try {
$tanQuery = $listener->walletQuery($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanQuery);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}
break;
case '/v1/wallet/carbon':
$payload = new TanSiLuWalletCarbonPayload();
$payload->setToken($requestPayload->token);
$payload->setOpenid($requestPayload->openid);
$payload->setOrderNo($requestPayload->order_no);
$payload->setMileage($requestPayload->mileage);
$payload->setOrderTime($requestPayload->order_time);
$payload->setOrderState($requestPayload->order_state);
$payload->setVehicleModel($requestPayload->vehicle_model);
$payload->setNewEnergy($requestPayload->new_energy);
$payload->setCompleteTime($requestPayload->complete_time ?? '');
$payload->setOrderPay($requestPayload->order_pay);
$payload->setBehavior($requestPayload->behavior ?? '');
try {
$tanCarbon = $listener->walletCarbon($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanCarbon);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}
break;
case "/v1/file/video/compressed":
$this->log(json_encode($requestPayload));
$payload = new TanSiLuVideoCompressedPayload();
$payload->setId($requestPayload->id);
$payload->setStatus($requestPayload->status);
$payload->setResult($requestPayload->result);
$payload->setPayload(empty($requestPayload->payload) ? "" : $requestPayload->payload);

try {
$tanCompress = $listener->compressed($payload);
$resp->setResult(self::RESULT_OK);
$resp->setPayload($tanCompress);
} catch (exception\ExecuteException $e) {
$resp->setResult($e->getResult());
}

break;
default:
$resp->setResult(self::RESULT_FAIL);
break;
}
 */