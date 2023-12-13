<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuWanShunIntegralRequestPayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/carbon/integral";
    }

    /**
     * @var string 用户OpenID
     */
    public string $openid;
    /**
     * @var string 积分类型
     */
    public string $typeId;
    /**
     * @var string 积分类型名称
     */
    public string $typeName;
    /**
     * @var string 发生的积分数量
     */
    public string $value;
    /**
     * @var string 发生后的积分余额
     */
    public string $balance;
    /**
     * @var string 发生的时间
     */
    public string $time;
    /**
     * @var string|null 备注信息
     */
    public ?string $fettle;
    /**
     * @var string 积分的订单号
     */
    public string $orderNo;

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
    public function getTypeId(): string
    {
        return $this->typeId;
    }

    /**
     * @param string $typeId
     */
    public function setTypeId(string $typeId): void
    {
        $this->typeId = $typeId;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->typeName;
    }

    /**
     * @param string $typeName
     */
    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getBalance(): string
    {
        return $this->balance;
    }

    /**
     * @param string $balance
     */
    public function setBalance(string $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return string|null
     */
    public function getFettle(): ?string
    {
        return $this->fettle;
    }

    /**
     * @param string|null $fettle
     */
    public function setFettle(?string $fettle): void
    {
        $this->fettle = $fettle;
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

}