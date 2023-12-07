<?php

namespace com\tsl3060\open\sdk\objs\notify;

class UserItem
{

    /**
     * @var string 用户OPENID
     */
    public string $openid;
    /**
     * @var string 万顺关联账号
     */
    public string $wid;

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
    public function getWid(): string
    {
        return $this->wid;
    }

    /**
     * @param string $wid
     */
    public function setWid(string $wid): void
    {
        $this->wid = $wid;
    }


}