<?php

namespace Controllers;

use Models\Strax as Model;
use Models\System;

class Strax extends Client
{
    public function action_all()
    {
        $strax = new Model();
        $straxid = $strax->all();

        $this->title .= 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $straxid]
        );
    }

    public function action_one()
    {
        $strax = new Model();
        $straxid = $strax->One($this->params[2]);

        $this->title .= 'Справочник strax';

        $this->content = System::template('v_strax.php',
            ['content' => $straxid]
        );
    }
}