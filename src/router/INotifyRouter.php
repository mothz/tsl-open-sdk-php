<?php

namespace com\tsl3060\open\sdk\router;

interface INotifyRouter
{
    function path(): string;

    function makeBody(object $payload);
}