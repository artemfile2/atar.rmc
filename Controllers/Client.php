<?php

namespace Controllers;

use Models\System;

abstract class Client extends Base{
    protected $title;
    protected $content;
    protected $params;
    
    public function __construct(){
        $this->title = 'Наш сайт - ';
        $this->content = '';
    }

    public function render(){
        $html = System::template('v_main.php', [
            'title' => $this->title,
            'content' => $this->content
         ]);
         
        return $html;
    } 
}
