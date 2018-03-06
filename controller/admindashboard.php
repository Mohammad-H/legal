<?php
class admindashboard extends Controller {

    public function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1 && $level!=2){header('location:'.URL_SITE.'adminlogin');}
    }

    public function index()
    {
        $columnCount = $this->model->countcol();

//        $output = $this->getAjax();
        $data =  array('all' => '','columnCount'=>$columnCount );
        $this->view('admin/dashboard/index',$data,1,1,'view/admin/admin_header.php','view/admin/admin_footer.php');
    }

    public function getAjax()
    {
        $allData['data'] = $this->model->getAllRow();
//        $allData['data'] = json_encode($allData);
         echo json_encode($allData);

       /* $output = '';

        foreach ($allData as $value)
        {
            echo $output = '<tr><td>'.$value['user_id'].'</td><td>'.$value['username'].'</td><td>'.$value['first_name'].'</td><td>'.$value['first_name'].'</td><td>'.$value['last_name'].'</td><td class="text-center"><ul class="icons-list"><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a><ul class="dropdown-menu dropdown-menu-right"><li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li><li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li><li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li></ul></li></ul></td></tr>';
        }

        return $output;*/

    }
}