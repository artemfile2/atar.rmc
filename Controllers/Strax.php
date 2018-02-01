<?php

namespace Controllers;

use Models\Database;

class Strax
{
    protected $db;
    protected $m_db;

    public function __construct(){
        $this->m_db = new Database();
        $this->db = $this->m_db->getDb();
    }

    public function getAll()
    {
        $query = $this->db
            ->query('SELECT * FROM strax');

        return $query;
    }
}