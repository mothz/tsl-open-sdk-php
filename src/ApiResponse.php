<?php

namespace com\tsl3060\open\sdk;

class ApiResponse
{

    private string $time;
    private string $sign;

    private string $charset;

    private string $responseId = "";
    private int $errCode;
    private string $errMsg = "";
    private int $subErr;
    private string $subMsg = "";

    private string $signType = "";

    private ?object $payload;

    private string $openId = "";

    private ?string $description="";

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
     * @return string
     */
    public function getResponseId(): string
    {
        return $this->responseId;
    }

    /**
     * @param string $responseId
     */
    public function setResponseId(string $responseId): void
    {
        $this->responseId = $responseId;
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
     * @return string
     */
    public function getErrMsg(): string
    {
        return $this->errMsg;
    }

    /**
     * @param string $errMsg
     */
    public function setErrMsg(string $errMsg): void
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
     * @return string
     */
    public function getSubMsg(): string
    {
        return $this->subMsg;
    }

    /**
     * @param string $subMsg
     */
    public function setSubMsg(string $subMsg): void
    {
        $this->subMsg = $subMsg;
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        return $this->signType;
    }

    /**
     * @param string $signType
     */
    public function setSignType(string $signType): void
    {
        $this->signType = $signType;
    }

    /**
     * @return ?object
     */
    public function getPayload(): ?object
    {
        return $this->payload;
    }

    /**
     * @param ?object $payload
     */
    public function setPayload(?object $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getOpenId(): string
    {
        return $this->openId;
    }

    /**
     * @param string $openId
     */
    public function setOpenId(string $openId): void
    {
        $this->openId = $openId;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


}