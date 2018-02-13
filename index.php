<?php

session_start();

//error_reporting(E_ALL);

/*echo 'Document root: '.$_SERVER['DOCUMENT_ROOT'].'<br>';
echo 'Полный путь к скрипту и его имя: '.$_SERVER['SCRIPT_FILENAME'].'<br>';
echo 'Имя скрипта: '.$_SERVER['SCRIPT_NAME'];*/

spl_autoload_register(function($classname) {
    $classname = strtolower($classname);
    $classname = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    //echo 'zxc= '.__DIR__.'='.$classname. '.php<br>' ;
    //echo dirname(__FILE__) .'='. DIRECTORY_SEPARATOR;
    //echo __DIR__.DIRECTORY_SEPARATOR.$classname.'<br>';
    include_once(__DIR__.DIRECTORY_SEPARATOR.$classname . '.php');
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
    $contr_name = 'controllers\\' . $params; //ucfirst($params);
    $action = isset($params_arr[1]) ? 'action_' . $params_arr[1] : 'action_index';
}
else{
    $contr_name = 'controllers\\' . 'pages'; //ucfirst('pages');
    $action = 'show404';
}

$controller = new $contr_name();
//echo '<hr>'.var_dump($controller);

$controller->load($params_arr);

$controller->$action();

$html = $controller->render();

echo $html;