<?php

namespace Controllers;

use Models\Strax as ModelStrax;
use Models\System;

class Strax extends Client
{
    public function action_all()
    {
        $strax = new ModelStrax();
        $straxid = $strax->all();

        $this->title .= 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $straxid,
             'breadcrumb' => [
                 'Главная',
                 'Справочник strax'
             ]
            ]);
    }

    public function action_one()
    {
        $strax = new ModelStrax();
        $straxid = $strax->NumDepart($this->params[2]);

        $this->title .= 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $straxid,
             'breadcrumb' => [
                 'Главная',
                 'Справочник strax',
                 'Отдел '.$this->params[2]
             ]
            ]);
    }
}