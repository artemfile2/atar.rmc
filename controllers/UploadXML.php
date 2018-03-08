<?php

namespace controllers;

use ZipArchive;
use models\ModelXML;

class UploadXML extends client
{
    public $fileXML = './files/zip/ht05s50_1802052310o.zip';
    //public $fileXML = './files/zip/ht05s50_1802051702p.zip';
    private $pathXML = './files/xml/';
    private $timestart;

    public function action_XMLload()
    {
        $this->extractZIP();

        $nameFile = basename($this->fileXML, '.zip');
        $ht_file = $this->pathXML . $nameFile .'.XML';

        if (file_exists($ht_file)) {
            // если файл существует, то подключаемся к нему
            $xml_ht = simplexml_load_file($ht_file);
            $this->XMLtoTable($xml_ht);
        } else {
            // если файл не существует, выводит ошибку
            exit('Файл "'.$ht_file.'" не существует!');
        }
        echo '<br>Время выполнения скрипта: '.(microtime(true) - $this->timestart).' сек.';
    }

    private function XMLtoTable($xml){

        ModelXML::getInstance()
            ->NewTable($this->fileXML);

        $short_name = substr(basename($this->fileXML, '.zip'), 8, 10);

        foreach($xml->ZAP as $zap){
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
            

            ModelXML::getInstance()
                ->fillTable('pacient_'.$short_name, $paramsxml);

            foreach ($zap->SLUCH as $sluch){
                $paramsxml2 = [
                    'ID_PAC' => $zap->PACIENT->ID_PAC,
                    'IDCASE' => $sluch->IDCASE,
                    'USL_OK' => $sluch->USL_OK,
                    'VIDPOM' => $sluch->VIDPOM,
                    'DISP' => $sluch->DISP,
                    'FOR_POM' => $sluch->FOR_POM,
                    'METOD_HMP' => $sluch->METOD_HMP,
                    'NPR_MO' => $sluch->NPR_MO,
                    'LPU' => $sluch->LPU,
                    'LPU_1' => $sluch->LPU_1,
                    'PODR' => $sluch->PODR,
                    'PROFIL' => $sluch->PROFIL,
                    'NHISTORY' => $sluch->NHISTORY,
                    'DATE_1' => $sluch->DATE_1,
                    'DATE_2' => $sluch->DATE_2,
                    'DS0' => $sluch->DS0,
                    'VNOV_M' => $sluch->VNOV_M,
                    'RSLT' => $sluch->RSLT,
                    'ISHOD' => $sluch->ISHOD,
                    'IDDOKT' => $sluch->IDDOKT,
                    'ED_COL' => $sluch->ED_COL,
                    'TARIF' => $sluch->TARIF,
                    'SUMV' => $sluch->SUMV,
                ];
                

                ModelXML::getInstance()
                    ->fillTable('sluch_'.$short_name, $paramsxml2);

                foreach ($sluch->USL as $usl){
                    $paramsxml3 = [
                        'IDCASE' => $sluch->IDCASE,
                        'IDSERV' => $usl->IDSERV,
                        'LPU' => $usl->LPU,
                        'LPU_1' => $usl->LPU_1,
                        'PODR' => $usl->PODR,
                        'DET' => $usl->DET,
                        'DATE_IN' => $usl->DATE_IN,
                        'DATE_OUT' => $usl->DATE_OUT,
                        'DS' => $usl->DS,
                        'CODE_USL' => $usl->CODE_USL,
                        'ED_COL' => $usl->ED_COL,
                        'KOEF_K' => $usl->KOEF_K,
                        'POUH' => $usl->POUH,
                        'ZAK' => $usl->ZAK,
                        'KOL_USL' => $usl->KOL_USL,
                        'TARIF' => $usl->TARIF,
                        'SUMV_USL' => $usl->SUMV_USL,
                        'PRVS' => $usl->PRVS,
                        'CODE_MD' => $usl->CODE_MD,
                        'COMENTU' => $usl->COMENTU,
                        'DIR2' => $usl->DIR2,
                        'GR_ZDOROV' => $usl->GR_ZDOROV,
                        'STUDENT' => $usl->STUDENT,
                        'SPOLIS' => $usl->SPOLIS,
                        'NPOLIS' => $usl->NPOLIS,
                        'STAND' => $usl->STAND,
                        'P_PER' => $usl->P_PER,
                        'NPL' => $usl->NPL,
                        'idsh' => $usl->idsh,
                    ];

                    ModelXML::getInstance()
                        ->fillTable('usl_'.$short_name, $paramsxml3);
                }
            }
        }
        $this->deleteFiles();
        echo '<br><br>';
        $today = date("H:i:s");
        echo("Текущее время: $today");
    }

    private function extractZIP()
    {
        if (file_exists($this->fileXML)){
            $this->timestart = microtime(true);

            $today = date("H:i:s");
            echo("Текущее время: $today");
            echo '<br><br>';

            $zip = new ZipArchive();
            if ($zip->open($this->fileXML)) {
                $zip->extractTo($this->pathXML);
                $zip->close();
            }
            else{
                exit("Невозможно открыть {$this->fileXML}");
            }
        }
        else{
            echo 'File "'.$this->fileXML.'" not found';
        }

    }

    private function deleteFiles()
    {
        foreach(glob($this->pathXML.'*.XML') as $filex){
            unlink($filex);
        }
    }
}