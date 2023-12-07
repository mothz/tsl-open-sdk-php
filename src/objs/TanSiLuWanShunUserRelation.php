<?php

namespace com\tsl3060\open\sdk\objs;


class TanSiLuWanShunUserRelation
{
    /**
     * @var string 用户OpenID
     */
    public string $openid;

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


}