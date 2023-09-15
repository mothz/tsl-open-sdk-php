<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class TanSiLuWanShunCarbonNotifyPayload extends RequestPayload implements IApiRequest
{

    function path(): string
    {
        return "/v1/tansilu/carbon/wanshun";
    }


    public string $carbon_no;
    public string $openid;
    public string $carbon;
    public string $amount;
    public string $order_no;
    public string $order_time;
    public string $complete_time;
    public string $type;
    public string $from;

    public string $source;

    /**
     * @return string
     */
    public function getCarbonNo(): string
    {
        return $this->carbon_no;
    }

    /**
     * @param string $carbon_no
     */
    public function setCarbonNo(string $carbon_no): void
    {
        $this->carbon_no = $carbon_no;
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
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->order_no;
    }

    /**
     * @param string $order_no
     */
    public function setOrderNo(string $order_no): void
    {
        $this->order_no = $order_no;
    }

    /**
     * @return string
     */
    public function getOrderTime(): string
    {
        return $this->order_time;
    }

    /**
     * @param string $order_time
     */
    public function setOrderTime(string $order_time): void
    {
        $this->order_time = $order_time;
    }

    /**
     * @return string
     */
    public function getCompleteTime(): string
    {
        return $this->complete_time;
    }

    /**
     * @param string $complete_time
     */
    public function setCompleteTime(string $complete_time): void
    {
        $this->complete_time = $complete_time;
    }

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
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }




}