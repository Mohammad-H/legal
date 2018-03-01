<?php
class adminlogin extends Controller {

    public function __construct()
    {
    }

    public function index()
    {
        $this->view('admin/login/index',[],1,1,'view/admin/login/login_header.php','view/admin/login/login_footer.php');
    }

    public function checkuser()
    {

        $form = $_POST;

        $this->model->checkUser($form);
        /*Model::sessionInit();
        $check=Model::sessionGet('userId');

        if($check==false){
            header('location:'.URL_SITE.'adminlogin');
        }else{
            echo 'login success!';
            header('location:'.URL_SITE.'admindashboard');
        }*/



    }
}