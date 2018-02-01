<?php

namespace Controllers;

abstract class Base{
    public function load($params){
        $this->params = $params;
    }
    
    public abstract function render(); 
}
