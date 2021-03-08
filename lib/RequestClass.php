<?php


class RequestClass
{
    public function isPostRequest($arr)
    {
        if (!empty($arr)) {
            return true;
        }
        return false;
    }
}