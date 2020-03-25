<?php

class Core{

    protected $controller = 'Products';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){

        $url = $this->getUrl();

        // Get controller
        if(isset($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            $this->controller = ucwords($url[0]);
            unset($url[0]);
        }  

        require_once '../app/controllers/' . $this->controller . '.php';    

        // Instantiate controller class, current page
        $this->controller = new $this->controller();

        // Get method
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
            }
            unset($url[1]);
        }
        
        // Get params
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}