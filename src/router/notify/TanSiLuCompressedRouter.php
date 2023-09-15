<?php

namespace com\tsl3060\open\sdk\router\notify;

use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\objs\TanSiLuVideoCompressedPayload;

class TanSiLuCompressedRouter implements \com\tsl3060\open\sdk\router\INotifyRouter
{

    private INotifyListener $listener;

    public function __construct(INotifyListener $listener)
    {
        $this->listener = $listener;
    }

    function path(): string
    {
        return "/v1/file/video/compressed";
    }

    function makeBody(object $payload): \com\tsl3060\open\sdk\objs\TanSiLuVideoCompressedAnswer
    {
        $p = new TanSiLuVideoCompressedPayload();
        $p->setId($payload->id);
        $p->setStatus($payload->status);
        $p->setResult($payload->result);
        $p->setPayload(empty($payload->payload) ? "" : $payload->payload);

        return $this->listener->compressed($p);
    }
}