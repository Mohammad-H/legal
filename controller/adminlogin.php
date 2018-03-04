<?php
class adminlogin extends Controller {

    public function __construct()
    {
    }

    public function index()
    {
        $this->view('admin/login-register/login',[],1,1,'view/admin/login-register/login_header.php','view/admin/login-register/login_footer.php');
    }

    public function checkuser()
    {

        $form = $_POST;

        $this->model->checkUser($form);
        Model::sessionInit();
        $check=Model::sessionGet('userId');

        if($check==false){
            header('location:'.URL_SITE.'adminlogin');
            exit();
        }else{
            header('location:'.URL_SITE.'admindashboard');
            exit();
        }
    }
}