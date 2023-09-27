<?php

namespace com\tsl3060\open\sdk\secure;

use com\tsl3060\open\sdk\ApiRequest;
use com\tsl3060\open\sdk\ApiResponse;
use com\tsl3060\open\sdk\Config;
use com\tsl3060\open\sdk\NotifyRequest;
use com\tsl3060\open\sdk\NotifyResponse;

class RSASecure implements ISecure
{
    /**
     * 签名算法
     */
    private const SIGNATURE_ALGORITHM = OPENSSL_ALGO_SHA256;

    private const DIGEST_ALGORITHM = "SHA256";
    public const NAME = "RSA";

    function name(): string
    {
        return self::NAME;
    }

    private function object2link(?object $payload): string
    {
        if (!$payload) {
            return "";
        }
        $payloadArr = [];
        foreach ($payload as $k => $v) {
            $payloadArr[$k] = $v;
        }
        //排序
        ksort($payloadArr, SORT_NATURAL);

        $payStrArr = [];
        foreach ($payloadArr as $k => $v) {
            if (is_bool($v)) {
                $payStrArr[] = $k . '=' . ($v ? 'true' : 'false');
            } elseif (is_double($v)) {
                $payStrArr[] = $k . '=' . (floatval($v));
            }elseif(is_float($v)){
                $payStrArr[] = $k . '=' . (floatval( $v));
            }else{
                $payStrArr[] = $k . '=' . $v;
            }

        }
        $payStr = join('&', $payStrArr);


        return $payStr;

    }

    private function sign(string $str): ?string
    {
        //生成摘要数据
        $digest = openssl_digest($str, self::DIGEST_ALGORITHM, true);
        if (!$digest) {
            //摘要生成失败
            return null;
        }

        $signature = '';
        $pKey = openssl_get_privatekey($this->config->getPrivateKey());
        if (!$pKey) {
            //私钥加载失败
            return null;
        }
        $result = openssl_sign($digest, $signature, $pKey, OPENSSL_ALGO_SHA256);
        if ($result) {
            return bin2hex($signature);
        }
        return null;
    }

    /**
     * 请求签名
     * @param ApiRequest $apiRequest
     * @return string|null
     */
    function requestSign(ApiRequest $apiRequest): ?string
    {
        //获取待签数据载体
        $payload = $apiRequest->getPayload();

        $payStr = $this->object2link($payload);
        //拼接字符串
        $waitSign = sprintf("%s&%s&%s&%s&%s&%s&%s",
            $apiRequest->getPath(),
            $apiRequest->getAppId(),
            $apiRequest->getAccessToken(),
            $apiRequest->getSignType(),
            $apiRequest->getCharset(),
            $apiRequest->getTime(),
            $payStr
        );

        return $this->sign($waitSign);

    }

    private function responseServerVerify(string $content, string $sign)
    {

        //生成摘要数据
        $digest = openssl_digest($content, self::DIGEST_ALGORITHM, true);
        if (!$digest) {
            //摘要生成失败
            return false;
        }
        $str = $this->config->getApiPublicKey();
        $pkey = openssl_get_publickey($str);
        if (!$pkey) {
            return false;
        }
        $result = openssl_verify($digest, hex2bin($sign), $pkey, self::SIGNATURE_ALGORITHM);
        return $result === 1;
    }

    /**
     * 同步返回验签
     * @param ApiResponse $apiResponse
     * @return bool
     */
    function verifyResponse(ApiResponse $apiResponse): bool
    {

        $payload = $apiResponse->getPayload();
        $payStr = $this->object2link($payload);
        //拼接字符串
        $waitSign = sprintf("%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s",
            $apiResponse->getResponseId(),
            $apiResponse->getErrCode(),
            $apiResponse->getErrMsg(),
            $apiResponse->getSubErr(),
            $apiResponse->getSubMsg(),
            $apiResponse->getTime(),
            $apiResponse->getOpenId() ?? '',
            $apiResponse->getSignType(),
            $apiResponse->getCharset(),
            $apiResponse->getDescription() ?? '',
            $payStr
        );

        //生成摘要数据
        return $this->responseServerVerify($waitSign, $apiResponse->getSign());
    }

    function verifyNotify(NotifyRequest $response): bool
    {
        $payload = $response->getPayload();
        $payStr = $this->object2link($payload);
        //拼接字符串
        $waitSign = sprintf("%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s&%s",
            $response->getNotifyId(),
            $response->getSourceId(),
            $response->getAppId(),
            $response->getErrCode(),
            $response->getErrMsg(),
            $response->getSubErr(),
            $response->getSubMsg(),
            $response->getTime(),
            $response->getOpenId() ?? '',
            $response->getSignType(),
            $response->getCharset(),
            $response->getDescription() ?? '',
            $payStr
        );
        //file_put_contents("php://stdout",$waitSign);
        return $this->responseServerVerify($waitSign, $response->getSign());
    }

    /**
     * 通知反馈签名
     * @param NotifyResponse $response
     * @return string|null
     */
    function notifyAnswerSign(NotifyResponse $response): ?string
    {
        $payload = $response->getPayload();
        $payStr = $this->object2link($payload);
        //拼接字符串
        $waitSign = sprintf("%s&%s&%s&%s&%s&%s&%s",
            $response->getAnswerId(),
            $response->getAppId(),
            $response->getResult(),
            $response->getSignType(),
            $response->getCharset(),
            $response->getTime(),
            $payStr
        );

        return $this->sign($waitSign);
    }


    private Config $config;

    function setConfig(Config $config)
    {
        $this->config = $config;
    }
}