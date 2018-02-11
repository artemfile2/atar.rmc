<?php

namespace Controllers;

use Models\Auth;

abstract class Base{

    protected $params;
    protected $auth;

    public abstract function render();
    public abstract function show404();

    public function load($params){

        $this->params = $params;
    }

    public function __call($name, $arguments)
    {
        $this->show404();
    }
}
