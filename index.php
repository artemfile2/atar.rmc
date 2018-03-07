<?php

session_start();

define('INDEXPATH', __DIR__.DIRECTORY_SEPARATOR);

include_once "core/bootstrap.php";

define('ROOT', '/');

$params_arr = explode('/', $_GET['q']);
$cnt = count($params_arr);

if($params_arr[$cnt - 1] === ''){
    unset($params_arr[$cnt - 1]);
}

$params = $params_arr[0] ?? 'filial';
$controllers = ['filial', 'strax', 'pages', 'auth', 'uploadxml'];

if (in_array($params, $controllers)) {
    $contr_name = 'controllers\\' . ucfirst($params);
    $action = isset($params_arr[1]) ? 'action_' . $params_arr[1] : 'action_index';
}
else{
    $contr_name = 'controllers\\' . ucfirst('pages');
    $action = 'show404';
}

$controller = new $contr_name();

$controller->load($params_arr);

$controller->$action();

$html = $controller->render();

echo $html;