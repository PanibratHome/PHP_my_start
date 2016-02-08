<?php

class Router {
    //put your code here
    private $routes;
    private $replaceMask = '/WebShopIlya/index.php';
    function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }
        
    public function getURI() {
        $request = $_SERVER['REQUEST_URI'];
        $request = str_replace($this->replaceMask, '', $request);
        $request = trim($request, '/');
        return $request;
    }
    public function run() {
        $uri = $this->getURI();
        echo "User called: {$uri}";
        foreach ($this->routes as $path => $logic) {
            if($uri === $path){
                echo "<br>Нашли логику для данного пути:<br>";
                echo "{$logic}";
                $segments = explode('/', $logic);
                $controllerName = array_shift($segments);
                $controllerName = ucfirst($controllerName)."Controller";
                $controllerFileName = $controllerName.".php";
                echo "<br>{$controllerName}";
                echo "<br>{$controllerFileName}";
            }
        }
    }
    
}
