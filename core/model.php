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

    public function one($pk)
    {
        $res = $this->db
            ->select("SELECT * FROM {$this->table} WHERE {$this->pk} = :pk",
            ['pk' => $pk],
            1);

        return $res ?? null;
    }

    public function add(array $params)
    {
        return $this->db->insert($this->table, $params);
    }

    public function edit($pk, $obj)
    {
        return $this->db->update($this->table, $obj, "{$this->pk}=:TABN", ['TABN' => $pk]);
    }

    public function del($pk)
    {
        return $this->db->delete($this->table, "{$this->pk}=:pk", ['pk' => $pk]);
    }
}