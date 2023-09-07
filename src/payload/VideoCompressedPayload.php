<?php

namespace com\tsl3060\open\sdk\payload;

use com\tsl3060\open\sdk\IApiRequest;

class VideoCompressedPayload extends RequestPayload implements IApiRequest
{
    /**
     * @var string 任务ID
     */
    public string $id;
    /**
     * @var string 源视频地址
     */
    public string $url;
    /**
     * @var string 保存区块
     */
    public string $bucket;
    /**
     * @var string 保存路径
     */
    public string $ossPath;

    public string $platform;

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform): void
    {
        $this->platform = $platform;
    }


    /**
     * @return string 请求地址
     */
    function path(): string
    {
        return "/v1/file/video/compressed";
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->bucket;
    }

    /**
     * @param string $bucket
     */
    public function setBucket(string $bucket): void
    {
        $this->bucket = $bucket;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getOssPath(): string
    {
        return $this->ossPath;
    }

    /**
     * @param string $ossPath
     */
    public function setOssPath(string $ossPath): void
    {
        $this->ossPath = $ossPath;
    }


}