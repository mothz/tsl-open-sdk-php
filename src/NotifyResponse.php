<?php

namespace com\tsl3060\open\sdk;

class NotifyResponse
{
    public string $answer_id;
    public string $app_id;
    public string $time;
    public ?object $payload;

    public string $sign;


    public string $sign_type;

    public string $charset;

    public ?string $result;

    /**
     * @return string
     */
    public function getAnswerId(): string
    {
        return $this->answer_id;
    }

    /**
     * @param string $answer_id
     */
    public function setAnswerId(string $answer_id): void
    {
        $this->answer_id = $answer_id;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->app_id;
    }

    /**
     * @param string $app_id
     */
    public function setAppId(string $app_id): void
    {
        $this->app_id = $app_id;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
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
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @param string $sign
     */
    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        return $this->sign_type;
    }

    /**
     * @param string $sign_type
     */
    public function setSignType(string $sign_type): void
    {
        $this->sign_type = $sign_type;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset): void
    {
        $this->charset = $charset;
    }

    /**
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param string|null $result
     */
    public function setResult(?string $result): void
    {
        $this->result = $result;
    }





}