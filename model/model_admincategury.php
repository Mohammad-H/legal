<?php
class model_admincategury extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getcategury()
    {
        $sql = "SELECT * FROM categury ORDER BY id DESC";
        $result = $this->select($sql);
        return $result;
    }

    public function getcategury_by_id($id)
    {
        $sql = "SELECT * FROM categury WHERE id = ?";
        $result = $this->select($sql,array($id),1);
        return $result;
    }

    public function addcategury($data=array())
    {
        $title = $data['title'];
        $parent = $data['parent'];
        $sql = "INSERT INTO categury (title,parent) VALUES (?,?)";
        $value = array($title,$parent);
        $this->doQuery($sql,$value);
    }
}