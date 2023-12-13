<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuWalletQuery
{
    /**
     * @var string 用户OPENID
     */
    public string $openid;
    /**
     * @var string 低碳积分
     */
    public string $carbon;

    /**
     * @var string 绿色积分
     */
    public string $integral;

    /**
     * @var string 查询结果
     */
    public string $query;

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
    public function getCarbon(): string
    {
        return $this->carbon;
    }

    /**
     * @param string $carbon
     */
    public function setCarbon(string $carbon): void
    {
        $this->carbon = $carbon;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getIntegral(): string
    {
        return $this->integral;
    }

    /**
     * @param string $integral
     */
    public function setIntegral(string $integral): void
    {
        $this->integral = $integral;
    }




}