<?php

namespace models;

class filial{
    protected $db;
    protected $m_db;
    private static $instance;

    public function getInstance(){
        if (!isset(self::$instance)) {
            self::$instance = new self();
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
            ->query('SELECT * FROM filial ORDER BY kod');

        return $query->fetchAll();
    }

}