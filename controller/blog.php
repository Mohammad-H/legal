<?php
class blog extends Controller {
    public function index($page=1)
    {
        $pageindex = $page;
        $limit = 2;
        $start = ($pageindex-1) * $limit ;
        $pagintion = $this->model->getuserlimit($start,$limit);
        $countpost = $this->model->countuser();
        $lastpage = ceil($countpost / $limit);
        parent::view("blog/index",array('limit'=>$pagintion,'pageindex'=>$pageindex,'countpost'=>$lastpage));
    }

}