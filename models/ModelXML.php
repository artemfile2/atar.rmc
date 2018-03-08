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
        $tableName = 'pacient_' . substr(basename($file, '.zip'), 8, 10);

        $queryTable = $this->db->checkTable($tableName);

        if ($queryTable) {
            echo 'table found';
        } else {
            $sql = "CREATE TABLE {$tableName} 
                    (id_pac VARCHAR(18),  vpolis INTEGER(1), 
                     s_polis VARCHAR(3), npolis VARCHAR(16),
                     st_okato VARCHAR(5), smo VARCHAR(5),
                     smo_ogrn VARCHAR(13), smo_ok VARCHAR(5),
                     smo_nam VARCHAR(50), novor INTEGER(1),
                     vnov_d INTEGER(1))";
            $this->db->createTable($sql);
        }
        /////////////////////////////////////////////
        $tableName2 = 'sluch_' . substr(basename($file, '.zip'), 8, 10);

        $queryTable2 = $this->db->checkTable($tableName2);

        if ($queryTable2) {
            echo 'table found';
        } else {
            $sql = "CREATE TABLE {$tableName2} 
                    (ID_PAC VARCHAR(18),
                     IDCASE VARCHAR(36),  USL_OK INTEGER(1), 
                     VIDPOM INTEGER(2), FOR_POM INTEGER(2),
                     DISP VARCHAR(5), VID_HMP VARCHAR(5),
                     METOD_HMP VARCHAR(13), NPR_MO VARCHAR(5),
                     EXTR INTEGER(1), LPU VARCHAR(5),
                     LPU_1 VARCHAR(5),
                     PODR INTEGER(3), PROFIL INTEGER(3), 
                     DET INTEGER(1), NHISTORY VARCHAR(7),
                     DATE_1 DATE, DATE_2 DATE,
                     DS0 VARCHAR(6), DS1 VARCHAR(6),
                     DS2 VARCHAR(6), DS3 VARCHAR(6),
                     VNOV_M INTEGER(1),
                     CODE_MES1 VARCHAR(9), CODE_MES2 VARCHAR(9), 
                     RSLT INTEGER(3), RSLT_D INTEGER(3),
                     ISHOD INTEGER(9), PRVS INTEGER(4),
                     VERS_SPEC VARCHAR(5), IDDOKT VARCHAR(16),
                     OS_SLUCH INTEGER(1), IDSP INTEGER(2),
                     ED_COL FLOAT (5,2),
                     TARIF FLOAT(13,2), SUMV FLOAT(13,2), 
                     OPLATA FLOAT(13,2), SUMP FLOAT(13,2),
                     SANK_IT VARCHAR(5), TAL_D DATE,
                     TAL_P DATE, VBR VARCHAR(2),
                     P_OTK VARCHAR(2), NRISOMS INTEGER(1),
                     DS1_PR INTEGER(1),
                     DS4 VARCHAR(2), NAZN INTEGER(1), 
                     NAZ_SP VARCHAR(3), NAZ_V VARCHAR(2),
                     NAZ_PMP VARCHAR(5), NAZ_PK VARCHAR(5),
                     PR_D_N INTEGER(2))";
            $this->db->createTable($sql);
        }
        /////////////////////////////////////////////
        $tableName3 = 'usl_' . substr(basename($file, '.zip'), 8, 10);

        $queryTable3 = $this->db->checkTable($tableName3);

        if ($queryTable3) {
            echo 'table found';
        } else {
            $sql = "CREATE TABLE {$tableName3} 
                    (IDCASE VARCHAR(36),  IDSERV VARCHAR(36), 
                     LPU VARCHAR(5), LPU_1 VARCHAR(5),
                     PODR VARCHAR(5), PROFIL INTEGER(3),
                     DET INTEGER(1), DATE_IN DATE,
                     DATE_OUT DATE, DS VARCHAR(6),
                     CODE_USL VARCHAR(16),
                     ED_COL FLOAT (5,2), KOEF_K FLOAT (5,2), 
                     POUH INTEGER(1), ZAK INTEGER(1),
                     KOL_USL FLOAT (5,2), TARIF FLOAT (13,2),
                     SUMV_USL FLOAT (13,2), PRVS VARCHAR(6),
                     CODE_MD VARCHAR(17), COMENTU VARCHAR(20),
                     DIR2 INTEGER(1),
                     GR_ZDOROV INTEGER(1), STUDENT INTEGER(1), 
                     SPOLIS VARCHAR(3), NPOLIS VARCHAR(16),
                     STAND INTEGER(1), P_PER INTEGER(1),
                     NPL INTEGER(1), idsh INTEGER(1))";
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