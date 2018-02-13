<?php

namespace controllers;

use models\filial as Model;
use models\system;
use models\mainmenu;

class filial extends client
{
    private $mainmenu;
    private $filial_all;

    public function __construct(){

        $this->mainmenu = (new mainmenu())->Menu();

        $this->filial_all = (new Model())->All();

        $this->auth = (new auth())->check();

        if(!$this->auth) {
            header("Location: " . ROOT . 'auth/login');
            exit();
        }
    }

    public function action_index()
    {

        $this->title .= 'главная';
        $this->content = system::template('v_main.php', [
            'content_main' => 'ATAR',
            'mainmenu' => $this->mainmenu,
            'breadcrumb' => [
                'Главная',
                ]
            ]);
    }

    public function action_all()
    {

        if ($this->filial_all == null){
            $this->show404();
            return;
        }

        $this->title = 'Справочник filial';

        $this->content = system::template('v_filial.php',
            ['content' => $this->filial_all,
             'mainmenu' => $this->mainmenu,
             'breadcrumb' => [
                 'Главная',
                 'Справочник filial'
                ]
            ]);
    }

}