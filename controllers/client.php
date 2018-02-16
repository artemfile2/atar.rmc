<?php

namespace controllers;

use core\system;
use models\mainmenu;

abstract class client extends base{
    protected $title;
    protected $content;
    protected $params;
    protected $menu;
    
    public function __construct(){
        $this->title = 'Наш сайт - ';
        $this->content = '';
    }

    public function render(){

            $menu = new mainmenu();
            $mainmenu = $menu->Menu();

            $html = system::template('base.php', [
                'title' => $this->title,
                'content' => $this->content,
                'mainmenu' => $mainmenu
            ]);

            return $html;
    }

    public function show404()
    {
        $this->title = 'Страница не найдена';
        $this->content = system::template('v_404.php');
    }
}