<?php

namespace com\tsl3060\open\sdk;

use com\tsl3060\open\sdk\exception\ExecuteException;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindAnswer;
use com\tsl3060\open\sdk\objs\TanSiLuOpenidBindPayload;
use com\tsl3060\open\sdk\objs\TanSiLuVideoCompressedAnswer;
use com\tsl3060\open\sdk\objs\TanSiLuVideoCompressedPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbon;
use com\tsl3060\open\sdk\objs\TanSiLuWalletCarbonPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQuery;
use com\tsl3060\open\sdk\objs\TanSiLuWalletQueryPayload;
use com\tsl3060\open\sdk\objs\TanSiLuWanShunUserRelation;
use com\tsl3060\open\sdk\objs\TanSiLuWanShunUserRelationPayload;

/**
 * 通知事件监听
 */
interface INotifyListener
{
    /**
     * 用户OPENID绑定通知监听
     * @param TanSiLuOpenidBindPayload $payload 绑定通知数据载体
     * @return TanSiLuOpenidBindAnswer 绑定结果数据
     * @throws ExecuteException 执行异常
     */
    function openid(TanSiLuOpenidBindPayload $payload): TanSiLuOpenidBindAnswer;

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


    /**
     * 视频文件压缩切片
     * @param TanSiLuVideoCompressedPayload $payload
     * @return TanSiLuVideoCompressedAnswer
     */
    function compressed(TanSiLuVideoCompressedPayload $payload): TanSiLuVideoCompressedAnswer;

    /**
     * 万顺用户关系调整
     * @param TanSiLuWanShunUserRelationPayload $payload
     * @return TanSiLuWanShunUserRelation
     */
    function wanshunUserRelation(TanSiLuWanShunUserRelationPayload $payload): TanSiLuWanShunUserRelation;
}