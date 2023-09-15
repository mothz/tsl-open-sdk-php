<?php

namespace com\tsl3060\open\sdk\router;

use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\router\notify\TanSiLuCompressedRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuLoginRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuOpenidBindRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuRegisterRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuSmsSendRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuWalletCarbonRouter;
use com\tsl3060\open\sdk\router\notify\TanSiLuWalletQueryRouter;

class NotifyMapRouter
{

    private array $map = [];

    public function __construct(INotifyListener $listener)
    {
        //绑定
        $tanSiLuBindRouter = new TanSiLuOpenidBindRouter($listener);
        $this->map[$tanSiLuBindRouter->path()] = $tanSiLuBindRouter;

        //查询
        $tanSiLuWalletQueryRouter = new TanSiLuWalletQueryRouter($listener);
        $this->map[$tanSiLuWalletQueryRouter->path()] = $tanSiLuWalletQueryRouter;

        //低碳订单
        $tanSiLuWalletCarbonRouter = new TanSiLuWalletCarbonRouter($listener);
        $this->map[$tanSiLuWalletCarbonRouter->path()] = $tanSiLuWalletCarbonRouter;

        //视频压缩
        $tanSiLuCompressedRouter = new TanSiLuCompressedRouter($listener);
        $this->map[$tanSiLuCompressedRouter->path()] = $tanSiLuCompressedRouter;

    }


    public function get(string $module): ?INotifyRouter
    {

        if (isset($this->map[$module])) {
            return $this->map[$module];
        }
        return null;
    }

}