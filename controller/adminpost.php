<?php
class adminpost extends Controller {

    public function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1){header('location:'.URL_SITE.'adminlogin');}
    }

    public function index()
    {
//        $getpost = $this->model->getpost();
        $data = array();
        $this->view('admin/post/list_post/index',[],1,1,'view/admin/admin_header.php','view/admin/admin_footer.php');
    }

    public function addpost()
    {
        if (isset($_POST['submit']))
        {
            if (isset($_POST['title']) && !empty($_POST['title']) && !empty($_FILES['image']['name']))
            {
                $result = $this->model->addpost($_POST, $_FILES['image']);


            } else {
               // header("Location: " . URL_SITE . "adminpost/addpost/?empty=1");
            }
        }

        $category = $this->model->getCategory();
        $data = array('category' => $category);
        $this->view('admin/post/add_post/index', $data,1,1,"view/admin/admin_header.php","view/admin/admin_footer.php");
    }

    public function editpost($id)
    {
        if (isset($_POST['submit']))
        {
            if (isset($_POST['title']) && !empty($_POST['title']))
            {
                $this->model->editpost($id, $_POST, $_FILES['image']);
            }else{
                header("Location: " . URL_SITE . "adminpost/editpost/".$id."/?empty=1");
            }
        }

        $postinfo = $this->model->getPostInfo($id);
        $category = $this->model->getCategory();
        $data = array('postinfo'=>$postinfo,'categury'=>$category);
        $this->view('admin/post/edit_post/index', $data,1,1,"view/admin/admin_header.php","view/admin/admin_footer.php");
    }

    public function deleteGrouppost()
    {
        if (isset($_POST['groupdelete']))
        {
            if(isset($_POST['delItem']))
            {
                $result = $this->model->deleteGrouppost($_POST['delItem']);
                if ($result) {
                    header('location:' . URL_SITE . 'adminpost/');
                }
            }
        }
    }

}