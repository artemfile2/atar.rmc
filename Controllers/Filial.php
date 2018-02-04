<?php

namespace Controllers;

use Models\Filial as Model;
use Models\System;

class Filial extends Client{

    public function action_index()
    {
        $this->title .= 'главная';

        $this->content = System::template('v_main.php', [
            'content_main' => 'ATAR',
            'breadcrumb' => [
                'Главная',
                ]
            ]);
    }

    public function action_all()
    {
        $filial = new Model();
        $fil_all = $filial->All();

        $this->title .= 'Справочник filial';

        $this->content = System::template('v_filial.php',
            ['content' => $fil_all,
             'breadcrumb' => [
                 'Главная',
                 'Справочник filial'
                ]
            ]);
    }

}