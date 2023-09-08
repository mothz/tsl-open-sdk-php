<?php

namespace com\tsl3060\open\sdk;

use com\tsl3060\open\sdk\secure\RSASecure;

class Config
{

    /**
     * 应用私钥
     * @var
     */
    private string $privateKey = "";
    private string $publicKey = "";
    /**
     * API 平台公钥
     * @var
     */
    private string $apiPublicKey = "";

    /**
     * 应用程序ID
     * @var
     */
    private string $appId = "";

    /**
     * 默认的签名类型
     * @var
     */
    private string $signType = RSASecure::NAME;
    /**
     * 字符编码
     * @var
     */
    private string $charset = "utf-8";

    /**
     * 通讯主机地址
     * @var string
     */
    private string $host = "https://open.tsl3060.com";

    /**
     * 内容编码
     * @var string
     */
    private string $contentType = "application/json;charset=utf-8";


    /**
     * 时间格式
     */
    private string $dateFormat = "Y-m-d H:i:s";

    /**
     * @var bool 是否为调试模式
     */
    private bool $debug = false;

    /**
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     */
    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }


    /**
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     */
    public function setPrivateKey(string $privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @param string $publicKey
     */
    public function setPublicKey(string $publicKey): void
    {
        $this->publicKey = $publicKey;
    }


    /**
     * @return string
     */
    public function getApiPublicKey(): string
    {
        return $this->apiPublicKey;
    }

    /**
     * @param string $apiPublicKey
     */
    public function setApiPublicKey(string $apiPublicKey): void
    {
        $this->apiPublicKey = $apiPublicKey;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }


    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId): void
    {
        $this->appId = $appId;
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
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     */
    public function setDebug(bool $debug): void
    {
        $this->debug = $debug;
    }



}