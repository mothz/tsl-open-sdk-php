<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuRegisterPayload
{
    public string $phone;
    public string $sms;
    public string $device;
    public string $ip;
    public string $form;

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
    public function getSms(): string
    {
        return $this->sms;
    }

    /**
     * @param string $sms
     */
    public function setSms(string $sms): void
    {
        $this->sms = $sms;
    }

    /**
     * @return string
     */
    public function getDevice(): string
    {
        return $this->device;
    }

    /**
     * @param string $device
     */
    public function setDevice(string $device): void
    {
        $this->device = $device;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->form;
    }

    /**
     * @param string $form
     */
    public function setForm(string $form): void
    {
        $this->form = $form;
    }


}