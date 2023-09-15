<?php

namespace com\tsl3060\open\sdk\router\notify;

use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQuery;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQueryPayload;

class TanSiLuWalletQueryRouter implements \com\tsl3060\open\sdk\router\INotifyRouter
{

    private INotifyListener $listener;

    public function __construct(INotifyListener $listener)
    {
        $this->listener = $listener;
    }

    function path(): string
    {
        return "/v1/wallet/query";
    }

    function makeBody(object $payload): TanSiLuWalletQuery
    {
        $p = new TanSiLuWalletQueryPayload();
        $p->setOpenid($payload->openid);

        return $this->listener->walletQuery($p);
    }
}