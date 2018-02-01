<?php

namespace Models;

class System
{
    public function template($path, $array = []){
        extract($array);
        ob_start();
            include "View/{$path}";
        return ob_get_clean();
    }
}