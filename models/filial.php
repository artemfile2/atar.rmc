<?php

namespace models;

use core\database;

class filial{

    use \core\singleton;

    protected $db;
    protected $m_db;

    protected function __construct(){
        $this->db = database::getInstance();
    }

    public function All()
    {
        return $this->db
            ->select("SELECT * FROM filial ORDER BY kod");
    }

}