<?php

Class App{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();

        require_once '../app/routes.php';

        if(isset($url[0])){
            $route = $url[0];
        } else {
            $route = '';  // Set default route
        }
        
        if(isset($url[1])){
            $route .= '/'.$url[1];
        }
        
        if(array_key_exists($route, $routes)){
            $this->controller = $routes[$route]['controller'];
            $this->method = $routes[$route]['method'];
            $this->params = array_slice($url, 2);
        } else {
            echo '404 Not Found';
            return;
        }
        

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;  
        call_user_func_array([$this->controller, $this->method], $this->params);

    }


    private function parseURL(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            return explode('/', filter_var(trim($url, '/'), FILTER_SANITIZE_URL));
        }
        return [''];
    }
}
