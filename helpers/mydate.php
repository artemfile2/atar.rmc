<?php

namespace helpers;


class mydate
{
    public static function setDate($date)
    {
        $myDate = date('d.m.Y', strtotime($date));
        return $myDate;
    }
}