<?php

namespace models;

use core\model;

class filial extends model{

    use \core\singleton;

    protected $db;
    protected $m_db;

    protected function __construct(){
        parent::__construct();
        $this->table = 'filial';
    }

}