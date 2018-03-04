<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class model_admincategury extends Eloquent {

    protected $table = "categury";
    protected $guarded = [];
    public $timestamps = false;
    public function __construct()
    {
//        parent::__construct();
    }

    public function getcategury()
    {
//        $sql = "SELECT * FROM categury ORDER BY id DESC";
        $result = self::all();
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
//        print_r_debug_die($data);
        $datainvoice = array(
            'title' => $data['title'],
            'parent' => $data['parent']
        );

        //save result of invoice
        $resultforinvoice = self::create($datainvoice);
        if ($resultforinvoice) {
            echo "ok";
        }
        else {
            echo "no";
        }


        /*$title = $data['title'];
        $parent = $data['parent'];
        $sql = "INSERT INTO categury (title,parent) VALUES (?,?)";
        $value = array($title,$parent);
        $this->doQuery($sql,$value);*/
    }
}