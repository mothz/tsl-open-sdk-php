<?php

namespace com\tsl3060\open\sdk\router\notify;

use com\tsl3060\open\sdk\INotifyListener;
use com\tsl3060\open\sdk\objs\notify\UserItem;
use com\tsl3060\open\sdk\objs\TanSiLuWanShunUserRelation;
use com\tsl3060\open\sdk\objs\TanSiLuWanShunUserRelationPayload;

class TanSiLuWanShunUserRelationRouter implements \com\tsl3060\open\sdk\router\INotifyRouter
{

    private INotifyListener $listener;

    /**
     * @param INotifyListener $listener
     */
    public function __construct(INotifyListener $listener)
    {
        $this->listener = $listener;
    }


    function path(): string
    {
        return "/v1/user/relation";
    }

    function makeBody(object $payload): TanSiLuWanShunUserRelation
    {

        $body = new TanSiLuWanShunUserRelationPayload();
        $body->setOpenid($payload->openid);

        if ($payload->parent) {
            $parent = new UserItem();
            $parent->setOpenid($payload->parent->openid);
            $parent->setWid($payload->parent->wid);
            $body->setParent($parent);
        }
        if ($payload->children) {
            $child = [];
            foreach ($payload->children as $v) {
                $cv=new UserItem();
                $cv->setOpenid($v->openid);
                $cv->setWid($v->wid);
                $child[]=$cv;
            }
            $body->setChild($child);
        }


        //$payload->setParent();
        return $this->listener->wanshunUserRelation($body);
    }
}