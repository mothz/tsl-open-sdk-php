<?php

namespace com\tsl3060\open\sdk\router\notify;

use com\tsl3060\open\sdk\exception\ExecuteException;
use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindAnswer;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindPayload;

class TanSiLuOpenidBindRouter implements \com\tsl3060\open\sdk\router\INotifyRouter
{
    private INotifyListener $listener;

    public function __construct(INotifyListener $listener)
    {
        $this->listener = $listener;
    }


    function path(): string
    {
        return "/v1/account/openid";
    }

    /**
     * @throws ExecuteException
     */
    function makeBody(object $payload): TanSiLuOpenidBindAnswer
    {
        $bind = new TanSiLuOpenidBindPayload();
        $bind->setOpenid($payload->openid);
        $bind->setType($payload->type);
        $bind->setAccount($payload->account);
        $bind->setUserType($payload->userType);


        return $this->listener->openid($bind);
    }
}