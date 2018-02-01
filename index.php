<?php

use Models\Query;
use Models\MainMenu;

spl_autoload_register(function($classname) {
    $classname = strtolower($classname);
    $classname = str_replace('\\', '/', $classname);
    include_once($classname . '.php');
});

$params_arr = explode('/', $_GET['q']);
$cnt = count($params_arr);
echo var_dump($params_arr).'<br>';

if($params_arr[$cnt - 1] === ''){
    unset($params_arr[$cnt - 1]);
}

$params = isset($params_arr[0]) ? $params_arr[0] : 'filial';
echo $params.'<br>';
$controllers = ['filial', 'strax'];

$contr_name = 'Controllers\\' . ucfirst($params);
$controller = new $contr_name();

echo $contr_name.'<br>';

$action = isset($params_arr[1]) ? 'action_' . $params_arr[1] : 'action_index';

$controller->load($params_arr);

echo $action;

/*$controller->$action();
$html = $controller->render();*/

echo $html;


$menu = new MainMenu();
$mainmenu = $menu->Menu();
/*$mainmenu['employees']['active'] = true;*/

/*$db = new \Controllers\Filial();
$filials = $db->getAll('filial');


include_once 'View/main.php';*/