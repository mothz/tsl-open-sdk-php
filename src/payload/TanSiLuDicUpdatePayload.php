<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuDicUpdatePayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/dic/update";
    }

    public string $key;
    public string $name;
    public string $type;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

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