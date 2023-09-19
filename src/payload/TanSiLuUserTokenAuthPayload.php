<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuUserTokenAuthPayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/account/check";
    }


    public string $token="";

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

}