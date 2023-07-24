<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuSmsSend
{
    public $phone;
    public $send;
    public $time;
    public $send_time;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSend()
    {
        return $this->send;
    }

    /**
     * @param mixed $send
     */
    public function setSend($send): void
    {
        $this->send = $send;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getSendTime()
    {
        return $this->send_time;
    }

    /**
     * @param mixed $send_time
     */
    public function setSendTime($send_time): void
    {
        $this->send_time = $send_time;
    }


}