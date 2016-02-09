<?php

//echo dirname(__FILE__);
//erpoiwarosaifgpoaisrgpoae
//dfgdfgdfg

//$string = 'This is a good page 23562346fdshsdhf';
//$pattern = '/.*good.*/';
//$result = preg_match($pattern, $string);
//echo $result;

//FRONT CONTROLLER

//1. Общие настройки
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
//2. Подключение файлов
    define('ROOT', dirname(__FILE__));
    //echo ROOT.'\components\Router.php';
    require_once(ROOT.'\components\Router.php');

//3. Соединение с БД

//4. Вызов Router

$router = new Router();
$router->run();