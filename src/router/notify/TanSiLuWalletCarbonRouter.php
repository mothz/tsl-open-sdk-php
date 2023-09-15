<?php

namespace com\tsl3060\open\sdk\router\notify;

use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbonPayload;
use com\tsl3060\open\sdk\router\INotifyRouter;

class TanSiLuWalletCarbonRouter implements INotifyRouter
{
    private INotifyListener $listener;

    public function __construct(INotifyListener $listener)
    {
        $this->listener = $listener;
    }

    function path(): string
    {
        return "/v1/wallet/carbon";
    }

    function makeBody(object $payload): \com\tsl3060\open\sdk\objs\TanSiLuWalletCarbon
    {
        $p = new TanSiLuWalletCarbonPayload();
        $p->setOpenid($payload->openid);
        $p->setOrderNo($payload->order_no);
        $p->setMileage($payload->mileage);
        $p->setOrderTime($payload->order_time);
        $p->setOrderState($payload->order_state);
        $p->setVehicleModel($payload->vehicle_model);
        $p->setNewEnergy($payload->new_energy);
        $p->setCompleteTime($payload->complete_time ?? '');
        $p->setOrderPay($payload->order_pay);
        $p->setBehavior($payload->behavior ?? '');

        return $this->listener->walletCarbon($p);
    }
}