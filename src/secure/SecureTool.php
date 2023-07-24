<?php

namespace com\tsl3060\open\sdk\secure;

use com\tsl3060\open\sdk\Config;

class SecureTool
{
    private array $secure = [];

    public function __construct(Config $config)
    {
        $rsa = new RSASecure();
        $rsa->setConfig($config);
        $this->secure[$rsa->name()] = $rsa;
    }

    /**
     * 获取安全模块
     * @return null|ISecure 安全模块
     */
    public function getSecure(string $name)
    {
        if (!empty($this->secure[$name])) {
            return $this->secure[$name];
        }
        return null;
    }

}