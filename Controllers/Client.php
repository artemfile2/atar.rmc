<?php

namespace Controllers;

use Models\System;
use Models\MainMenu;

abstract class Client extends Base{
    protected $title;
    protected $content;
    protected $params;
    protected $menu;
    
    public function __construct(){
        $this->title = 'Наш сайт - ';
        $this->content = '';
    }

    public function render(){

        //if ((new Auth())->check()) {
            $menu = new MainMenu();
            $mainmenu = $menu->Menu();

            $html = System::template('base.php', [
                'title' => $this->title,
                'content' => $this->content,
                'mainmenu' => $mainmenu
            ]);

            return $html;
        //}
    }

    public function show404()
    {
        $this->title = 'Страница не найдена';
        $this->content = System::template('v_404.php');
    }
}