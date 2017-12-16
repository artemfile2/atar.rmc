<?php

use Models\Query;
use Models\MainMenu;

spl_autoload_register(function($name) {
    require $name.'.php';
});

$menu = new MainMenu();
$mainmenu = $menu->Menu();
$mainmenu['index_list']['active'] = true;

$db = new Query();
$filials = $db->getAll('filial');


include_once 'view/main.php';