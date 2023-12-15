<?php

namespace com\tsl3060\open\sdk;

/**
 * 异步通知回调
 */
class NotifyRequest
{
    private string $notifyId;
    private string $appId;
    private string $module = "";
    private ?string $sourceId = "";
    private int $errCode;
    private ?string $errMsg;
    private int $subErr;
    private ?string $subMsg;
    private ?string $signType;
    private ?object $payload;
    private ?string $openId;
    private ?string $description;
    private ?string $charset = "UTF-8";
    private ?string $time;
    private ?string $sign;

    /**
     * 从JSON字符串载入
     * @param string $raw
     * @return void
     */
    public function loadFormJSON(string $raw): bool
    {
        $data = json_decode($raw);
        if (!$data) {
            return false;
        }
        try {
            if (!empty($data->notify_id)) {
                $this->setNotifyId($data->notify_id);
            }
            $this->setAppId($data->app_id);
            $this->setModule($data->module);
            $this->setSourceId($data->source_id ?? '');
            $this->setErrCode($data->err_code);
            $this->setErrMsg($data->err_msg);
            $this->setSubErr($data->sub_err);
            $this->setSubMsg($data->sub_msg ?? '');
            $this->setTime($data->time);
            $this->setOpenId($data->openid ?? '');

            $data->payload !== "" ? $this->setPayload($data->payload) : $this->setPayload(null);

//            if($data->payload){
//                if($data->payload==""){
//                    $this->setPayload(null);
//                }else{
//                    $this->setPayload($data->payload);
//                }
//            }else{
//                $this->setPayload(null);
//            }
            $this->setSign($data->sign);
            $this->setSignType($data->sign_type ?? '');
            $this->setCharset($data->charset ?? '');
            $this->setDescription($data->description ?? '');
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * @return string
     */
    public function getNotifyId(): string
    {
        return $this->notifyId;
    }

    /**
     * @param string $notifyId
     */
    public function setNotifyId(string $notifyId): void
    {
        $this->notifyId = $notifyId;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * @param string $module
     */
    public function setModule(string $module): void
    {
        $this->module = $module;
    }

    /**
     * @return string|null
     */
    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    /**
     * @param string|null $sourceId
     */
    public function setSourceId(?string $sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return int
     */
    public function getErrCode(): int
    {
        return $this->errCode;
    }

    /**
     * @param int $errCode
     */
    public function setErrCode(int $errCode): void
    {
        $this->errCode = $errCode;
    }

    /**
     * @return string|null
     */
    public function getErrMsg(): ?string
    {
        return $this->errMsg;
    }

    /**
     * @param string|null $errMsg
     */
    public function setErrMsg(?string $errMsg): void
    {
        $this->errMsg = $errMsg;
    }

    /**
     * @return int
     */
    public function getSubErr(): int
    {
        return $this->subErr;
    }

    /**
     * @param int $subErr
     */
    public function setSubErr(int $subErr): void
    {
        $this->subErr = $subErr;
    }

    /**
     * @return string|null
     */
    public function getSubMsg(): ?string
    {
        return $this->subMsg;
    }

    /**
     * @param string|null $subMsg
     */
    public function setSubMsg(?string $subMsg): void
    {
        $this->subMsg = $subMsg;
    }

    /**
     * @return string|null
     */
    public function getSignType(): ?string
    {
        return $this->signType;
    }

    /**
     * @param string|null $signType
     */
    public function setSignType(?string $signType): void
    {
        $this->signType = $signType;
    }

    /**
     * @return object|null
     */
    public function getPayload(): ?object
    {
        return $this->payload;
    }

    /**
     * @param object|null $payload
     */
    public function setPayload(?object $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * @return string|null
     */
    public function getOpenId(): ?string
    {
        return $this->openId;
    }

    /**
     * @param string|null $openId
     */
    public function setOpenId(?string $openId): void
    {
        $this->openId = $openId;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getCharset(): ?string
    {
        return $this->charset;
    }

    /**
     * @param string|null $charset
     */
    public function setCharset(?string $charset): void
    {
        $this->charset = $charset;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string|null
     */
    public function getSign(): ?string
    {
        return $this->sign;
    }

    /**
     * @param string|null $sign
     */
    public function setSign(?string $sign): void
    {
        $this->sign = $sign;
    }


}