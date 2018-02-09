<?php

namespace Models;

class System
{
    public static function template($path, $array = []){
        extract($array);
        ob_start();
            include "View/{$path}";
        return ob_get_clean();
    }

    public static function templateLogin($path){

        ob_clean();
        //ob_start();
        return include "View/{$path}";
        //return ob_get_clean();
    }
}