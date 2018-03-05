<?php
class app{
    //default controller
    public $controller = 'home';
    //default method
    public $method = 'index';

    public $params = array();

    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->parseUrl($url);
            $this->controller = $url[0];
            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
            $this->params = array_values($url);
        }
        $controlerUrl = 'controller/' . $this->controller . '.php';
        if (file_exists($controlerUrl)) {
            require($controlerUrl);
            $object = new $this->controller;

            $object->model($this->controller);

            if (method_exists($object, $this->method)) {
                $arr = array($object, $this->method);
                call_user_func_array($arr, $this->params);
            }else{
                $this->ErrorPage404();
            }
        }else{
            $this->ErrorPage404();
        }


    }

    function parseUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }

    function ErrorPage404()
    {
        $controlerUrl = 'controller/404.php';
        if (file_exists($controlerUrl))
        {
            require($controlerUrl);
            $object = new _404;
            $object->model('404');
            if (method_exists($object, 'index'))
            {
                $arr = array($object, 'index');
                call_user_func_array($arr, $this->params);
            }
        }
    }
}