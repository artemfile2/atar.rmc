<?php

namespace models;

class strax{
    protected $db;
    protected $m_db;
    private static $instance;

    public function getInstance(){
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function __construct(){
        $this->m_db = new database();
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

        $sql = "SELECT * FROM strax WHERE tabn LIKE :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch();
    }
}