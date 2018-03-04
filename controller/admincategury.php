<?php
class admincategury extends Controller {

    public function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1){header('location:'.URL_SITE.'adminlogin');}
    }

    public function index()
    {
        //$getcat = $this->model->getcategury();
        //$data = array('categury'=>$getcat);
        echo "index admin categury";

    }

    public function addcategury()
    {
        if (isset($_POST['submit']))
        {
            if (!empty($_POST['title']))
            {
                $this->model->addcategury($_POST);
            }else{
                 header("Location: ".URL_SITE."admincategury/addcategury/?emp=1");
            }
        }
        $getcat = $this->model->getcategury();
        //$getcatByid = $this->model->getcategury_by_id();
        $data = array('categury'=>$getcat);
        $this->view('admin/post/categury/index',$data,1,1,'view/admin/admin_header.php','view/admin/admin_footer.php');
    }
}