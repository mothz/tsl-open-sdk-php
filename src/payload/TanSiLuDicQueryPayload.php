<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuDicQueryPayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/dic/query";
    }

    public string $type;


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }


}