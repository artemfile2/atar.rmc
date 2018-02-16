<?php

namespace core;

use core\database;

abstract class model
{
    protected $db;
    protected $table;
    protected $pk;

    protected function __construct(){
        $this->db = database::getInstance();
    }

    public function all(){
        return $this->db->select("SELECT * FROM {$this->table}");
    }

    public function one($pk){
        $res = $this->db
            ->select("SELECT * FROM {$this->table} WHERE {$this->pk} = :pk",
            ['pk' => $pk],
            1);

        return $res ?? null;
    }
}