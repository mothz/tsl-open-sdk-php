<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuWalletCarbon
{
    /**
     * @var string 用户OPENID
     */
    public string $openid;
    /**
     * @var string 本次增加的碳积分
     */
    public string $carbon='0';
    /**
     * @var string 增加后的总碳积分
     */
    public string $total='0';
    /**
     * @var string 记录结果
     */
    public string $record;
    /**
     * @var string 记录时间
     */
    public string $record_time;

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
    public function getTotal(): string
    {
        return $this->total;
    }

    /**
     * @param string $total
     */
    public function setTotal(string $total): void
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getRecord(): string
    {
        return $this->record;
    }

    /**
     * @param string $record
     */
    public function setRecord(string $record): void
    {
        $this->record = $record;
    }

    /**
     * @return string
     */
    public function getRecordTime(): string
    {
        return $this->record_time;
    }

    /**
     * @param string $record_time
     */
    public function setRecordTime(string $record_time): void
    {
        $this->record_time = $record_time;
    }
}