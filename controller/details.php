<?php

class details extends Controller {

    public function index($id=null)
    {
        if ($id == null) { _404::index();exit; }
        /*$obj = new model_details();
        $getdetail = $obj->getdetails($id);*/
        $getdetail = $this->model->getdetails($id);
        if (empty($getdetail[0]['id'])) { _404::index();exit; }
        $data = array('detail'=>$getdetail);
        $this->view("details/index",$data);
    }
}