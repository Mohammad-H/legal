<?php
class admindashboard extends Controller {

    public function __construct()
    {
        parent::__construct();
        /*$level=Model::getUserLevel();
        if($level!=1){header('location:'.URL_SITE.'adminlogin');}*/
    }

    public function index()
    {
        $allData = $this->model->getAllRow();
        $data =  array('all' => $allData );
        $this->view('admin/dashboard/index',$data,1,1,'view/admin/admin_header.php','view/admin/admin_footer.php');
    }
}