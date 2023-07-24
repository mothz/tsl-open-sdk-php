<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuOpenidBind
{
    /**
     * @var string 用户OPENID
     */
    public string $openid;
    /**
     * @var string 绑定结果
     */
    public string $bind;

    /**
     * @return string
     */
    public function getOpenid(): string
    {
        return $this->openid;
    }

    /**
     * @param string $openid
     */
    public function setOpenid(string $openid): void
    {
        $this->openid = $openid;
    }

    /**
     * @return string
     */
    public function getBind(): string
    {
        return $this->bind;
    }

    /**
     * @param string $bind
     */
    public function setBind(string $bind): void
    {
        $this->bind = $bind;
    }


}