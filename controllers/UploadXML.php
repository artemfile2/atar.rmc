<?php

namespace controllers;

use ZipArchive;
use models\ModelXML;

class UploadXML extends client
{
    public $fileXML = './files/zip/ht05s50_1802052310o.zip';
    private $timestart;

    /*public function __construct(){
        ModelXML::getInstance();
    }*/

    public function action_XMLload()
    {
        $this->extractZIP();

        $ht_file = './files/xml/ht05s50_1802052310o.XML';

        if (file_exists($ht_file)) {
            // если файл существует, то подключаемся к нему
            $xml_ht = simplexml_load_file($ht_file);
            $this->XMLtoTable($xml_ht);
        } else {
            // если файл не существует, выводит ошибку
            exit('Файл "'.$ht_file.'" не существует!');
        }
        echo 'Время выполнения скрипта: '.(microtime(true) - $this->timestart).' сек.';
    }

    private function XMLtoTable($xml){
        $pc = 0;
        $sl = 0;
        $us = 0;

        ModelXML::getInstance()
            ->NewTable($this->fileXML);


        foreach($xml->ZAP as $zap){
            $pc++;
            echo "zap: ".$zap->N_ZAP.'<br>'; // вывод доп информации для теста и тд
            //echo "pac: ".$zap->PACIENT->ID_PAC.'<br>';

            $paramsxml = [
                'ID_PAC' => $zap->PACIENT->ID_PAC,
                'VPOLIS' => $zap->PACIENT->VPOLIS,
                'S_POLIS' => $zap->PACIENT->S_POLIS,
                'NPOLIS' => $zap->PACIENT->NPOLIS,
                'ST_OKATO' => $zap->PACIENT->ST_OKATO,
                'SMO' => $zap->PACIENT->SMO,
                'SMO_OGRN' => $zap->PACIENT->SMO_OGRN,
                'SMO_OK' => $zap->PACIENT->SMO_OK,
                'SMO_NAM' => $zap->PACIENT->SMO_NAM,
                'NOVOR' => $zap->PACIENT->NOVOR,
                'VNOV_D' => $zap->PACIENT->VNOV_D,
            ];

            $sql = "INSERT INTO pacient_1802052310 (id_pac, vpolis, s_polis, npolis,
                    st_okato, smo, smo_ogrn, smo_ok, smo_nam, novor, vnov_d) VALUES (:idpac,
                     :vpolis, :spolis, :npolis, :stokato, :smo, :smoogrn, :smook, :smo_nam,
                     :novor, :vnovd)";

            ModelXML::getInstance()
                ->fillTable('pacient_1802052310', $paramsxml);

            /*foreach ($zap->SLUCH as $sluch){
                $sl++;
                echo 'slu:-' . $sluch->IDCASE.'<br>';
                foreach ($sluch->USL as $usl){
                    $us++;
                    echo 'usl:--' . $usl->IDSERV.'<br>';
                }
            }*/
        }

        echo $pc.' кол-во пациентов.<br>';
        echo $sl.' кол-во стр.сл.<br>';
        echo $us.' кол-во усл.<br>';
    }

    private function extractZIP()
    {
        if (file_exists($this->fileXML)){
            $timestart = microtime(true);
            $zip = new ZipArchive();
            if ($zip->open($this->fileXML)) {
                $zip->extractTo('./files/xml/');
                $zip->close();
                echo 'file extract <br>';
            }
            else{
                exit("Невозможно открыть {$this->fileXML}");
            }
        }
        else{
            echo 'File "'.$this->fileXML.'" not found';
        }

    }
}