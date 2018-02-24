<?php

spl_autoload_register(function($classname) {
    $classname = strtolower($classname);
    $classname = str_replace('\\', DIRECTORY_SEPARATOR,
        INDEXPATH. $classname.'.php');
    try {
        if (!file_exists($classname)) {
            throw new Exception("File $classname not found", 1);
        }

        include_once $classname;
    }
    catch (Exception $e){
        echo "Error is catched!";
        echo '<br>';
        echo $e->getMessage();
        die();
    }
});