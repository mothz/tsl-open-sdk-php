<?php

namespace com\tsl3060\open\sdk\payload;

class RequestPayload
{
    private string $source;

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }


}