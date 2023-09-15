<?php

namespace com\tsl3060\open\sdk\secure;

use com\tsl3060\open\sdk\ApiRequest;
use com\tsl3060\open\sdk\ApiResponse;
use com\tsl3060\open\sdk\Config;
use com\tsl3060\open\sdk\NotifyRequest;
use com\tsl3060\open\sdk\NotifyResponse;

interface ISecure
{
    function setConfig(Config $config);

    /**
     * 安全模块名称
     * @return string
     */
    function name(): string;

    /**
     * 请求签名
     * @param ApiRequest $apiRequest
     * @return string|null
     */
    function requestSign(ApiRequest $apiRequest): ?string;

    /**
     * 对通知反馈进行数据签名
     * @param NotifyResponse $notifyResponse
     * @return mixed
     */
    function notifyAnswerSign(NotifyResponse $notifyResponse): ?string;

    /**
     * 验证同步返回验签
     * @param ApiResponse $apiResponse
     * @return bool
     */
    function verifyResponse(ApiResponse $apiResponse): bool;


    /**
     * 异步通知验签
     * @param NotifyRequest $notifyResponse
     * @return bool
     */
    function verifyNotify(NotifyRequest $notifyResponse): bool;
}