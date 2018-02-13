<?php

namespace models;

use PDO;

include_once 'config.php';

class database {

    protected static $db;
    private $host = HOST;
    private $dbname = DBNAME;
    private $user = USER;
    private $pass = PASSWORD;

    public function __construct()
    {
        if (static::$db === null){
            self::$db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user, $this->pass, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
        }
    }

    public static function getDb()
    {
        return self::$db;
    }

}