<?php

namespace com\tsl3060\open\sdk\objs;

class TanSiLuWalletCarbonPayload
{
    public string $token;
    public string $openid;
    /**
     * @var string 订单号
     */
    public string $orderNo;
    /**
     * @var float 公里数
     */
    public float $mileage;
    /**
     * @var string 订单创建时间
     */
    public string $orderTime;
    /**
     * @var string 订单状态
     */
    public string $orderState;
    /**
     * @var string 车辆型号
     */
    public string $vehicleModel;
    /**
     * @var bool 是否为新能源
     */
    public bool $newEnergy;
    /**
     * @var string 订单完成时间
     */
    public string $completeTime;
    /**
     * @var float 订单金额
     */
    public float $orderPay;

    /**
     * @var ?string 打车行为
     */
    public ?string $behavior="";

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
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

    /**
     * @return float
     */
    public function getMileage(): float
    {
        return $this->mileage;
    }

    /**
     * @param float $mileage
     */
    public function setMileage(float $mileage): void
    {
        $this->mileage = $mileage;
    }

    /**
     * @return string
     */
    public function getOrderTime(): string
    {
        return $this->orderTime;
    }

    /**
     * @param string $orderTime
     */
    public function setOrderTime(string $orderTime): void
    {
        $this->orderTime = $orderTime;
    }

    /**
     * @return string
     */
    public function getOrderState(): string
    {
        return $this->orderState;
    }

    /**
     * @param string $orderState
     */
    public function setOrderState(string $orderState): void
    {
        $this->orderState = $orderState;
    }

    /**
     * @return string
     */
    public function getVehicleModel(): string
    {
        return $this->vehicleModel;
    }

    /**
     * @param string $vehicleModel
     */
    public function setVehicleModel(string $vehicleModel): void
    {
        $this->vehicleModel = $vehicleModel;
    }

    /**
     * @return bool
     */
    public function isNewEnergy(): bool
    {
        return $this->newEnergy;
    }

    /**
     * @param bool $newEnergy
     */
    public function setNewEnergy(bool $newEnergy): void
    {
        $this->newEnergy = $newEnergy;
    }

    /**
     * @return string
     */
    public function getCompleteTime(): string
    {
        return $this->completeTime;
    }

    /**
     * @param string $completeTime
     */
    public function setCompleteTime(string $completeTime): void
    {
        $this->completeTime = $completeTime;
    }

    /**
     * @return float
     */
    public function getOrderPay(): float
    {
        return $this->orderPay;
    }

    /**
     * @param float $orderPay
     */
    public function setOrderPay(float $orderPay): void
    {
        $this->orderPay = $orderPay;
    }

    /**
     * @return string
     */
    public function getBehavior(): string
    {
        return $this->behavior;
    }

    /**
     * @param ?string $behavior
     */
    public function setBehavior(?string $behavior): void
    {
        $this->behavior = $behavior;
    }



}