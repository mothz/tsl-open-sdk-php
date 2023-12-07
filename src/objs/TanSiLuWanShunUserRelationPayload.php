<?php

namespace com\tsl3060\open\sdk\objs;


use com\tsl3060\open\sdk\objs\notify\UserItem;

class TanSiLuWanShunUserRelationPayload
{
    public string $openid;

    public UserItem $parent;

    public array $child;

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
     * @return UserItem
     */
    public function getParent(): UserItem
    {
        return $this->parent;
    }

    /**
     * @param UserItem $parent
     */
    public function setParent(UserItem $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return array
     */
    public function getChild(): array
    {
        return $this->child;
    }

    /**
     * @param array $child
     */
    public function setChild(array $child): void
    {
        $this->child = $child;
    }


}