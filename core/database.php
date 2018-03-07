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

    public function insert($table, $params){
        $keys = [];
        $masks = [];

        foreach($params as $k => $v){
            $keys[] = $k;
            $masks[] = ':' . $k;
        }

        $fields = implode(', ', $keys);
        $values = implode(', ', $masks);

        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $this->db->lastInsertId();
    }

    public function update($table, $obj, $where, $params = []){
        $pairs = [];

        foreach($obj as $k => $v){
            $pairs[] = "$k=:$k";
        }

        $pairs_str = implode(',', $pairs);
        $sql = "UPDATE $table SET $pairs_str WHERE $where";
        //$sql = "UPDATE $table SET $pairs_str WHERE tabn = '017232'";
        $merge = array_merge($obj, $params);
        //todo не работает нормально обновление данных, проверить
        echo $sql;
        echo '<br>';
        echo '<pre>'.print_r($merge).'</pre>';

        $query = $this->db->prepare($sql);
        $query->execute($merge);

        return $query->rowCount();
    }

    public function delete($table, $where, $params = []){
        $sql = "DELETE FROM $table WHERE $where";
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->rowCount(); //rowCount - количество затронутых строк
    }

    public function checkTable(string $table){
        $result = $this->db->query("SHOW TABLES LIKE '{$table}'");
        $query = $result !== false && $result->rowCount() > 0;
        return $query;
    }

    public function createTable(string $sql){
        try {
            $this->db->exec($sql);
        } catch(PDOException $e) {
            echo 'Ошибка: ' . $e->getMessage();
        }
    }
}