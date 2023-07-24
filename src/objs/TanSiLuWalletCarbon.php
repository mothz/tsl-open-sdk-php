<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuWalletCarbon
{
    /**
     * @var string 用户OPENID
     */
    public string $openid;
    /**
     * @var float 本次增加的碳积分
     */
    public float $carbon=0.0;
    /**
     * @var float 增加后的总碳积分
     */
    public float $total=0.0;
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
     * @return float
     */
    public function getCarbon(): float
    {
        return $this->carbon;
    }

    /**
     * @param float $carbon
     */
    public function setCarbon(float $carbon): void
    {
        $this->carbon = $carbon;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
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