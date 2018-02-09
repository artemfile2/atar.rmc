<?php

namespace Controllers;

use Models\Strax as ModelStrax;
use Models\System;
use Models\MainMenu;

class Strax extends Client
{
    private $mainmenu;
    private $straxid;

    public function __construct(){

        $this->mainmenu = (new MainMenu())->Menu();

        $this->straxid = (new ModelStrax())->All();

        $this->auth = (new Auth())->check();

        /*if(!$this->auth) {
            header("Location: " . ROOT . 'auth/login');
            exit();
        }*/
    }

    public function action_all()
    {
        /*$strax = new ModelStrax();
        $straxid = $strax->all();*/

        if ($this->straxid == null){
            $this->show404();
            return;
        }

        $this->title = 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $this->straxid,
             'mainmenu' => $this->mainmenu,
             'breadcrumb' => [
                 'Главная',
                 'Справочник strax'
             ]
            ]);
    }

    public function action_one()
    {
        //$strax = new ModelStrax();
        $straxid = (new ModelStrax())->NumDepart($this->params[2]);

        if ($straxid == null){
            $this->show404();
            return;
        }

        $this->title = 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $straxid,
             'mainmenu' => $this->mainmenu,
             'breadcrumb' => [
                 'Главная',
                 'Справочник strax',
                 'Отдел '.$this->params[2]
             ]
            ]);
    }
}