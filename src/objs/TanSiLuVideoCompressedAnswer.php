<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuVideoCompressedAnswer
{

    public string $id;

    /**
     * @param ?string $id
     */
    public function __construct(?string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

}