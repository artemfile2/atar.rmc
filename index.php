<?php

use Models\Query;
/*use Models\MainMenu;*/

spl_autoload_register(function($classname) {
    $classname = strtolower($classname);
    $classname = str_replace('\\', '/', $classname);
    include_once($classname . '.php');
});

define('ROOT', '/');

$params_arr = explode('/', $_GET['q']);
$cnt = count($params_arr);

if($params_arr[$cnt - 1] === ''){
    unset($params_arr[$cnt - 1]);
}

$params = isset($params_arr[0]) ? $params_arr[0] : 'filial';
$controllers = ['filial', 'strax'];

$contr_name = 'Controllers\\' . ucfirst($params);
$controller = new $contr_name();

$action = isset($params_arr[1]) ? 'action_' . $params_arr[1] : 'action_index';

$controller->load($params_arr);

$controller->$action();
$html = $controller->render();

echo $html;