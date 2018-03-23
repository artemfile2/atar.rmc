<?php

namespace controllers;

use models\filial as Model;
use models\mainmenu;
use core\system;

class filial extends client
{
    private $mainmenu;
    private $filial_all;

    /**
     * filial constructor.
     */
    public function __construct(){

        $this->mainmenu = (new mainmenu())->Menu();

        $this->filial_all = Model::getInstance()->All();

        $this->auth = (new auth())->check();

        if(!$this->auth) {
            header("Location: " . ROOT . 'auth/login');
            exit();
        }
    }

    /**
     *
     */
    public function action_index()
    {

        $menuActive = $this->mainmenu;
        $menuActive['index_list']['active'] = true;

        $this->title .= 'главная';
        $this->content = system::template('v_main.php', [
            'content_main' => 'ATAR',
            'mainmenu' => $menuActive,
            'breadcrumb' => [
                'Главная' => null,
                ]
            ]);
    }

    /**
     *
     */
    public function action_all()
    {

        if ($this->filial_all == null){
            $this->show404();
            return;
        }

        $menuActive = $this->mainmenu;
        $menuActive['index_list']['active'] = true;

        $this->title = 'Справочник filial';

        $this->content = system::template('v_filial.php',
            ['content' => $this->filial_all,
             'mainmenu' => $menuActive,
             'breadcrumb' => [
                 'Главная' => ROOT . 'filial/index',
                 'Тарификационный список' => null,
                ]
            ]);
    }

}