<?php

namespace Models;

class Filial extends Client{
    protected $db;
    protected $m_db;

    public function __construct(){
        $this->m_db = new Database();
        $this->db = $this->m_db->getDb();
    }

    public function All()
    {
        $query = $this->db
            ->query('SELECT * FROM filial ORDER BY kod');

        return $query;
    }
}