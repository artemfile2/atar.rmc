<?php

namespace Models;

use Models\Database;

class Query
{
    protected $db;
    protected $m_db;

    public function __construct(){
        $this->m_db = new Database();
        $this->db = $this->m_db->getDb();
    }

    public function getAll($table)
    {
        /*$dbs = $this->db;
        $query = $dbs->db
            ->query('SELECT * FROM '.$table.' ORDER BY kod');*/
        $query = $this->db
            ->query('SELECT * FROM '.$table.' ORDER BY kod');

        return $query;
    }

}