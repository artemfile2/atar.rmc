<?php

namespace models;

use core\model;

class strax extends model{

    use \core\singleton;

    protected $db;

    protected function __construct(){
        parent::__construct();
        $this->table = 'strax';
        $this->pk = 'tabn';
    }

    public function NumDepart($id)
    {
        $id = (string)($id);
        $this->pk = 'kod';
        $res = $this->db
            ->select("SELECT * FROM {$this->table} WHERE {$this->pk} = :id ORDER BY kod,tab",
                ['id'=>$id]);
        return $res ?? null;
    }

    public function NameDepart($id)
    {
        $id = (string)($id);
        $this->pk = 'kod';
        $res = $this->db
            ->select("SELECT * FROM filial WHERE {$this->pk} = :id",
                ['id'=>$id],
                1);
        return $res ?? null;
    }

    public function LastRecord($id, $pk = null)
    {
        $id = (string)($id);
        $this->pk = $pk ?? 'tabn';
        $res = $this->db
            ->select("SELECT * FROM {$this->table} WHERE {$this->pk} = :id ORDER BY datet DESC",
                ['id'=>$id],
                1);
        return $res ?? null;
    }
}