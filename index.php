<?php

session_start();

//error_reporting(E_ALL);

/*echo 'Document root: '.$_SERVER['DOCUMENT_ROOT'].'<br>';
echo 'Полный путь к скрипту и его имя: '.$_SERVER['SCRIPT_FILENAME'].'<br>';
echo 'Имя скрипта: '.$_SERVER['SCRIPT_NAME'];*/

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

$params = $params_arr[0] ?? 'filial';
$controllers = ['filial', 'strax', 'pages', 'auth'];

if (in_array($params, $controllers)) {
    $contr_name = 'Controllers\\' . ucfirst($params);
    $action = isset($params_arr[1]) ? 'action_' . $params_arr[1] : 'action_index';
}
else{
    $contr_name = 'Controllers\\' . ucfirst('pages');
    $action = 'show404';
}

$controller = new $contr_name();

$controller->load($params_arr);

$controller->$action();

$html = $controller->render();

echo $html;