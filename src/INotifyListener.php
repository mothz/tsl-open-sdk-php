<?php

namespace com\tsl3060\open\sdk;

use com\tsl3060\open\sdk\exception\ExecuteException;
use com\tsl3060\open\sdk\objs\TanSiLuLogin;
use com\tsl3060\open\sdk\objs\TanSiLuLoginPayload;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBind;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindPayload;
use com\tsl3060\open\sdk\objs\TanSiLuRegister;
use com\tsl3060\open\sdk\objs\TanSiLuRegisterPayload;
use com\tsl3060\open\sdk\objs\TanSiLuSmsSend;
use com\tsl3060\open\sdk\objs\TanSiLuSmsSendPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbon;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbonPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQuery;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQueryPayload;

/**
 * 通知事件监听
 */
interface INotifyListener
{
    /**
     * 短信发起通知监听
     * @param TanSiLuSmsSendPayload $payload 短信发请求的载体数据
     * @return TanSiLuSmsSend 发送结果数据
     * @throws ExecuteException 执行异常
     */
    function sms(TanSiLuSmsSendPayload $payload): TanSiLuSmsSend;


    /**
     * 用户注册通知监听
     * @param TanSiLuRegisterPayload $payload 监听的载体数据
     * @return TanSiLuRegister 注册结果数据
     * @throws ExecuteException 执行异常
     */
    function register(TanSiLuRegisterPayload $payload): TanSiLuRegister;

    /**
     * 用户OPENID绑定通知监听
     * @param TanSiLuOpenidBindPayload $payload 绑定通知数据载体
     * @return TanSiLuOpenidBind 绑定结果数据
     * @throws ExecuteException 执行异常
     */
    function openid(TanSiLuOpenidBindPayload $payload): TanSiLuOpenidBind;

    /**
     * 用户登录通知监听
     * @param TanSiLuLoginPayload $payload 登录数据载体
     * @return TanSiLuLogin 登录验证结果
     * @throws ExecuteException 执行异常
     */
    function login(TanSiLuLoginPayload $payload): TanSiLuLogin;


    /**
     * 查询用户账户数据
     * @param TanSiLuWalletQueryPayload $payload
     * @return TanSiLuWalletQuery
     */
    function walletQuery(TanSiLuWalletQueryPayload $payload): TanSiLuWalletQuery;


    /**
     * 增加碳积分订单
     * @param TanSiLuWalletCarbonPayload $payload
     * @return TanSiLuWalletCarbon
     */
    function walletCarbon(TanSiLuWalletCarbonPayload $payload): TanSiLuWalletCarbon;
}