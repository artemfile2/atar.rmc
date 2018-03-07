<?php

namespace models;

use core\model;

class ModelXML extends model
{
    use \core\singleton;

    protected $db;

    protected function __construct(){
        parent::__construct();
    }

    /*
     * Проверка есть ли в БД таблица с текущим именем
     * если нет создает
     */
    public function NewTable(string $file)
    {
        $tableName = 'pacient_'.substr(basename($file, '.zip'), 8, 10);
        $tableName = 'pacient_'.substr(basename($file, '.zip'), 8, 10);

        $queryTable = $this->db->checkTable($tableName);

        if ($queryTable){
            echo 'table found';
        }
        else {
            $sql = "CREATE TABLE {$tableName} 
                    (id_pac VARCHAR(18),  vpolis INTEGER(1), 
                     s_polis VARCHAR(3), npolis VARCHAR(16),
                     st_okato VARCHAR(5), smo VARCHAR(5),
                     smo_ogrn VARCHAR(13), smo_ok VARCHAR(5),
                     smo_nam VARCHAR(50), novor INTEGER(1),
                     vnov_d INTEGER(1))";
            $this->db->createTable($sql);
        }
    }

    /*
     * Заполнение полей таблицы из XML
     */
    public function fillTable(string $sql, array $params)
    {
        // Выводим все записи из XML файла
        $query = $this->db->insert($sql, $params);
    }
}