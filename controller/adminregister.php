<?php

class adminregister extends Controller{

    public function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1){header('location:'.URL_SITE.'adminlogin');}
    }

    public function index()
    {
        parent::view('admin/login-register/register',[],1,1,'view/admin/login-register/login_header.php','view/admin/login-register/login_footer.php');
    }

    public function register()
    {
        $form = $_POST;
        $out = $this->model->register($form);

        if($out==false){
            header('location:'.URL_SITE.'adminlogin');
            exit();
        }else{
            header('location:'.URL_SITE.'admindashboard');
            exit();
        }
    }
}