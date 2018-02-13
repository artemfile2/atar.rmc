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

        $this->straxid = (new ModelStrax())->All();

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

        $this->title = 'Справочник strax';

        $this->content = system::template('v_strax.php',
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
        $straxid = (new ModelStrax())->NumDepart($this->params[2]);

        if ($straxid == null){
            $this->show404();
            return;
        }

        $this->title = 'Справочник strax';

        $this->content = system::template('v_strax.php',
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