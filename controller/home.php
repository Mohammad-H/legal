<?php

class home extends Controller {

    public function index()
    {
        $getpost = $this->model->tr();
        /*$obj = new model_home();
        $getpost = $obj->tr();*/
        $data = array('post'=>$getpost);

        $this->view('index/index', $data);
    }
}