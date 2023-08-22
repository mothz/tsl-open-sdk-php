<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

/**
 * 短信验证码
 */
class SmsRequestPayload extends RequestPayload implements IApiRequest
{
    /**
     * 要接收的手机号
     */
    public string $phone;

    /**
     * @var int 验证码有效时间
     */
    public int $aliveTime = 0;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getAliveTime(): int
    {
        return $this->aliveTime;
    }

    /**
     * @param int $aliveTime
     */
    public function setAliveTime(int $aliveTime): void
    {
        $this->aliveTime = $aliveTime;
    }


    function path(): string
    {
        return "/v1/net/sms/send";
    }
}