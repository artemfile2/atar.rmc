<?php

namespace Models;

class Strax{
    protected $db;
    protected $m_db;

    public function __construct(){
        $this->m_db = new Database();
        $this->db = $this->m_db->getDb();
    }

    public function All()
    {
        $query = $this->db
            ->query('SELECT * FROM strax ORDER BY kod');

        return $query->fetchAll();
    }

    public function NumDepart($id)
    {
        $id = (string)($id);

        $sql = "SELECT * FROM strax WHERE kod='$id' ORDER BY kod,tab";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function One($id)
    {
        $id = (string)($id);

        $sql = "SELECT * FROM strax WHERE tabnum='$id'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}