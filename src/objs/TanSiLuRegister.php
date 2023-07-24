<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuRegister
{
    public string $phone;
    public string $openid;

    public string $register;

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

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
    public function getRegister(): string
    {
        return $this->register;
    }

    /**
     * @param string $register
     */
    public function setRegister(string $register): void
    {
        $this->register = $register;
    }


}