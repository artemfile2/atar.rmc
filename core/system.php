<?php

namespace core;

class system
{
    public static function template($path, $array = []){
        extract($array);
        ob_start();
            include "view/{$path}";
        return ob_get_clean();
    }
}