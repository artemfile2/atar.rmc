<?php

namespace controllers;

use models\strax as ModelStrax;
use models\system;
use models\mainmenu;

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

        if ($this->straxid == null){
            $this->show404();
            return;
        }

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;

        $this->title = 'Справочник strax';

        $this->content = system::template('v_strax.php',
            ['content' => $this->straxid,
             'mainmenu' => $menuActive,
             'breadcrumb' => [
                 'Главная' => ROOT . 'filial/index',
                 'Сотрудники' => null,
             ]
            ]);
    }

    public function action_depart()
    {
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
             'breadcrumb' => [
                 'Главная' => ROOT . 'filial/index',
                 'Сотрудники' => ROOT . 'strax/all',
                 'Отдел '.$this->params[2] => null,
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

        $menuActive = $this->mainmenu;
        $menuActive['employees']['active'] = true;

        $this->title = 'Справочник strax';
        $tabdepart = mb_substr($this->params[2], 0, 3);
        $this->content = system::template('v_employeecard.php',
            ['content' => $straxid,
                'mainmenu' => $menuActive,
                'breadcrumb' => [
                    'Главная' => ROOT . 'filial/index',
                    'Сотрудники' => ROOT . 'strax/all',
                    'Отдел '.$tabdepart => ROOT . 'strax/depart/'.$tabdepart,
                    'Карточка сотрудника' => null,
                ]
            ]);
    }
}