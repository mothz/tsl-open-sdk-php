<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuWanShunValueRequestPayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/carbon/update";
    }

    /**
     * @var string 用户OpenID
     */
    public string $openid;
    /**
     * @var string 低碳值类型
     */
    public string $typeId;
    /**
     * @var string 低碳值类型名称
     */
    public string $typeName;
    /**
     * @var string 发生的低碳值数量
     */
    public string $value;
    /**
     * @var string 发生后的低碳值余额
     */
    public string $balance;
    /**
     * @var string 发生前低碳值余额
     */
    public string $preBalance;
    /**
     * @var string 发生的时间
     */
    public string $time;
    /**
     * @var string|null 备注信息
     */
    public ?string $fettle;
    /**
     * @var ?string 万顺订单号
     */
    public ?string $orderNo;

    /**
     * @var string 低碳值的订单号
     */
    public string $carbonNo;

    /**
     * 变更科目
     */
    public string $subject;
    /**
     * 说明
     */
    public string $description;

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
    public function getOrderNo(): ?string
    {
        return $this->orderNo;
    }

    /**
     * @param ?string $orderNo
     */
    public function setOrderNo(?string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return string
     */
    public function getPreBalance(): string
    {
        return $this->preBalance;
    }

    /**
     * @param string $preBalance
     */
    public function setPreBalance(string $preBalance): void
    {
        $this->preBalance = $preBalance;
    }

    /**
     * @return string
     */
    public function getCarbonNo(): string
    {
        return $this->carbonNo;
    }

    /**
     * @param string $carbonNo
     */
    public function setCarbonNo(string $carbonNo): void
    {
        $this->carbonNo = $carbonNo;
    }


}