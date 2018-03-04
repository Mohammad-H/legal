<?php

class Controller {

    public $model;

    public function __construct()
    {

    }

    public static function view($path,$data = array(), $noIncludeHeader = '', $noIncludeFooter = '',$other_header='',$other_footer='')
    {
        if ($noIncludeHeader == '') {
            require_once("header.php");
        }elseif($other_header !=''){
            require_once($other_header);
        }

        require_once ("view/".$path.".php");

        if ($noIncludeFooter == '') {
            require_once("footer.php");
        }elseif($other_footer !=''){
            require_once($other_footer);
        }
    }

    function model($modelUrl)
    {
        require('model/model_' . $modelUrl . '.php');
        $classname = 'model_' . $modelUrl;
        $this->model = new $classname;
    }

}