<?php

namespace controllers;

use models\auth;

abstract class base{

    protected $params;
    protected $auth;

    /**
     * @return mixed
     */
    public abstract function render();
    public abstract function show404();

    /**
     * @param $params
     */
    public function load($params){

        $this->params = $params;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $this->show404();
    }
}
