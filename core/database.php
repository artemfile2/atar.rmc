<?php

namespace core;

use PDO;

include_once 'config.php';

class database {

    use \core\singleton;

    protected $db;
    private $host = HOST;
    private $dbname = DBNAME;
    private $user = USER;
    private $pass = PASSWORD;

    public function __construct()
    {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}",
            $this->user, $this->pass, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        return $this->db->exec("SET NAMES UTF8");
    }

    public function select($sql, $params = [], $oneRec = null){
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return is_null($oneRec) ? $query->fetchAll() : $query->fetch();
    }

    //todo добавить функции добавления, редактирования и удаления записи
}