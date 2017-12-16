<?php

namespace Models;

use PDO;

include_once 'config.php';

class Database {

    static $db;
    private $host = HOST;
    private $dbname = DBNAME;
    private $user = USER;
    private $pass = PASSWORD;

    public function __construct()
    {

        self::$db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
            $this->user, $this->pass);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public static function getDb()
    {
        return self::$db;
    }

}