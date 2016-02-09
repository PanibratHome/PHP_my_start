<?php

class Router {

    // в этой переменной будем хранить наши маршруты
    private $routes;
    private $mask;

    public  function  __construct()
    {
        $this->routes = include_once(ROOT.'/config/routes.php');
    }

    public function run() {
        $uri = $this->getURI();
        foreach($this->routes as $path=>$logic){

            if($path===$uri){

                $segments = explode('/', $logic);
                $controller = array_shift($segments);
                $action     = array_shift($segments);

                $controllerName = ucfirst($controller).'Controller';
                $controllerFileName = $controllerName.'.php';
                $actionName     = ucfirst($action).'Action';

                echo "<br>Controller: {$controllerName}";
                echo "<br>Action: {$actionName}";


                include_once(ROOT.'/controllers/'.$controllerFileName);
                $controller = new $controllerName;
                $controller->$actionName();

            }
        }
    }

    public function getURI() {
        $request = $_SERVER['REQUEST_URI'];
        $request = str_replace($this->mask, '', $request);
        $request = trim($request, '/');
        return $request;
    }
}