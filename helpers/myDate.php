<?php

namespace helpers;


class myDate
{
    public static function setDate($date)
    {
        $myDate = date('d.m.Y', strtotime($date));
        return $myDate;
    }
}