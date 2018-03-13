<?php

namespace controllers;

use models\strax as ModelStrax;
use models\mainmenu;
use core\system;
use helpers\mydate;

class strax extends client
{
    private $mainmenu;
    private $straxid;

    public function __construct(){

        $this->mainmenu = (new mainmenu())->Menu();

        $this->straxid = ModelStrax::getInstance()->All();

        $this->auth = (new auth())->check();

        if(!$this->auth) {
            header("Location: " . ROOT . 'auth/login');
            exit();
        }
    }

    public function action_all()
    {
        // Сколько всего записей в таблице strax
        $count = ModelStrax::getInstance()->CountFromTable();
        foreach ($count[0] as $item){
            $item = (int) $item;
        }

        $show_pages = 20; // Сколько записей покажем пользователю
        $page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);// Номер текущей страницы

        if ($page){
            $offset = (($show_pages * $page) - $show_pages);
        }
        else{
            $page = 1; // Ставим в единицу (первая страница) если не передан параметр $_GET['page']
            $offset = 0;
        }

        $pageTable = ModelStrax::getInstance()->ForPaginat($offset, $show_pages);

        if ($this->straxid == null){
            $this->show404();
            return;
        }

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;

        $this->title = 'Справочник strax';

        $this->content = system::template('v_strax.php',
            ['content' => $pageTable,
             'mainmenu' => $menuActive,
             'count' => $item,
             'show_pages' => $show_pages,
             'breadcrumb' => [
                 'Главная' => ROOT . 'filial/index',
                 'Сотрудники' => null,
             ]
            ]);
    }

    public function action_depart()
    {
        $NameFilial = ModelStrax::getInstance()
            ->NameDepart($this->params[2]);

        $LastRec = ModelStrax::getInstance()
            ->LastRecord($this->params[2], 'kod');

        $straxid = ModelStrax::getInstance()
            ->NumDepart($this->params[2]);

        if ($straxid == null){
            $this->show404();
            return;
        }

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;

        $this->title = 'Справочник strax';

        $this->content = system::template('v_strax.php',
            ['content' => $straxid,
             'mainmenu' => $menuActive,
             'nameMentor' => $NameFilial['ZAV'],
             'LastRec' => mydate::setDate($LastRec['DATET']),
             'breadcrumb' => [
                 'Главная' => ROOT . 'filial/index',
                 'Сотрудники' => ROOT . 'strax/all',
                 'Отдел '.$this->params[2] .' '. $NameFilial['NAME'] => null,
             ]
            ]);
    }

    public function action_one()
    {
        $straxid = ModelStrax::getInstance()
            ->One($this->params[2]);

        if ($straxid == null){
            $this->show404();
            return;
        }

        $tabdepart = mb_substr($this->params[2], 0, 3);
        $NameFilial = ModelStrax::getInstance()
            ->NameDepart($tabdepart);

        $LastRec = ModelStrax::getInstance()
            ->LastRecord($this->params[2]);

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;

        $this->title = 'Справочник strax';
        $this->content = system::template('v_employeecard.php',
            ['content' => $straxid,
                'mainmenu' => $menuActive,
                'nameMentor' => $NameFilial['ZAV'],
                'LastRec' => mydate::setDate($LastRec['DATET']),
                'breadcrumb' => [
                    'Главная' => ROOT . 'filial/index',
                    'Сотрудники' => ROOT . 'strax/all',
                    'Отдел '.$tabdepart .' '.$NameFilial['NAME'] => ROOT . 'strax/depart/'.$tabdepart,
                    'Карточка сотрудника' => null,
                ]
            ]);
    }

    public function action_add(){

        if (count($_POST) > 0) {
            ModelStrax::getInstance()->add($_POST);
        }

        $tabdepart = mb_substr($this->params[2], 0, 3);
        $NameFilial = ModelStrax::getInstance()
            ->NameDepart($tabdepart);

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;
        $content = [
            'KOD' => $tabdepart,
        ];
        $this->title = 'Справочник strax';
        $this->content = system::template('v_employeecard.php',['content' => $content,
            'mainmenu' => $menuActive,
            'nameMentor' => $NameFilial['ZAV'],
            'LastRec' => null,
            'breadcrumb' => [
                'Главная' => ROOT . 'filial/index',
                'Сотрудники' => ROOT . 'strax/all',
                'Отдел '.$tabdepart .' '.$NameFilial['NAME'] => ROOT . 'strax/depart/'.$tabdepart,
                'Карточка сотрудника - новая запись' => null,
            ]
        ]);
    }

    public function action_edit(){

        if (count($_POST) > 0) {
            ModelStrax::getInstance()->edit(
                $this->params[2],
                $_POST);
        }

        $straxid = ModelStrax::getInstance()
            ->One($this->params[2]);

        if ($straxid == null){
            $this->show404();
            return;
        }

        $tabdepart = mb_substr($this->params[2], 0, 3);
        $NameFilial = ModelStrax::getInstance()
            ->NameDepart($tabdepart);

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;
        $this->title = 'Справочник strax';
        $this->content = system::template('v_employeecard.php',[
            'content' => $straxid,
            'mainmenu' => $menuActive,
            'nameMentor' => $NameFilial['ZAV'],
            'LastRec' => null,
            'breadcrumb' => [
                'Главная' => ROOT . 'filial/index',
                'Сотрудники' => ROOT . 'strax/all',
                'Отдел '.$tabdepart .' '.$NameFilial['NAME'] => ROOT . 'strax/depart/'.$tabdepart,
                'Карточка сотрудника - новая запись' => null,
            ]
        ]);
    }

    public function action_delete(){
        ModelStrax::getInstance()->del($this->params[2]);
    }
}