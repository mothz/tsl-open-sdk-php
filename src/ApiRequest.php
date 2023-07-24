<?php

namespace com\tsl3060\open\sdk;

class ApiRequest
{
    private string $appId;
    /**
     * 请求路径
     */
    private string $path;

    /**
     * 访问TOKEN
     */

    private string $accessToken = "";

    /**
     * 签名数据
     */
    private string $sign;

    /**
     * 签名类型
     */

    private string $signType = "";
    /**
     * 数据编码
     */
    private string $charset = "";
    /**
     * 时间
     */
    private string $time = "";
    /**
     * 载体
     */
    private object $payload;

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
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
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
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param mixed $payload
     */
    public function setPayload($payload): void
    {
        $this->payload = $payload;
    }


}