<?php

namespace models;

use core\database;

class strax{

    use \core\singleton;

    protected $db;

    protected function __construct(){
        $this->db = database::getInstance();
    }

    public function All()
    {
        return $this->db
            ->select("SELECT * FROM strax ORDER BY kod");
    }

    public function NumDepart($id)
    {
        $id = (string)($id);
        $res = $this->db
            ->select("SELECT * FROM strax WHERE kod = :id ORDER BY kod,tab", ['id'=>$id]);
        return $res ?? null;
    }

    public function One($id)
    {
        $id = (string)($id);

        $res = $this->db
            ->select("SELECT * FROM strax WHERE tabn = :id ORDER BY kod,tab", ['id'=>$id]);
        return $res ?? null;
    }
}