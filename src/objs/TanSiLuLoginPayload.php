<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuLoginPayload
{

    /**
     * @var string 关联的账号
     */
    public string $account;

    /**
     * @var string 短信验证码
     */
    public string $sms;

    /**
     * @var string 用户OPENID
     */
    public string $openid;


    /**
     * @var string 账号类型
     */
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

    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @param string $account
     */
    public function setAccount(string $account): void
    {
        $this->account = $account;
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


}