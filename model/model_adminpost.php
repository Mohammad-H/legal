<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_adminpost extends Eloquent {
    protected $table = "post";
    public function __construct()
    {
//        parent::__construct();
    }

    function addpost($data = array(), $file = array())
    {
        /*echo "<pre>";
        print_r($data);
        print_r($file);die();*/
        $title = $data['title'];
        $detail = $data['detail'];
        $categury = $data['categury'];
        $alt_image = $data['alt_image'];
        $tags = $data['tags'];
        $approve = $data['approve'];


        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];

        if (!empty($fileName))
        {
            if($fileType =='image/png' ||  $fileType =='image/jpg' ||  $fileType =='image/jpeg' ||  $fileType =='image/gif')
            {
                $targetMain = 'public/img/post/';
                move_uploaded_file($fileTmp, $targetMain . $fileName);
                $sql = "INSERT INTO post (title,detail,categury,alt_image,tags,approve,image) VALUES (?,?,?,?,?,?,?)";
                $value = array($title, $detail, $categury,$alt_image,$tags,$approve,$fileName);
                $result = $this->doQuery($sql, $value);
                if ($result){
                    echo "ok";
                    die();
                }else{
                    echo "no";
                    die();
                }
            }
        }
    }

    function editpost($post_id,$data = array(), $file = array())
    {
        $title = $data['title'];
        $detail = $data['detail'];
        $categury = $data['categury'];
        $alt_image = $data['alt_image'];
        $tags = $data['tags'];
        $tags = str_replace('،', ',', $tags);
        $tags = str_replace('-', ',', $tags);
        $tags = str_replace('_', ',', $tags);
        $tags = str_replace('.', ',', $tags);
        $approve = $data['approve'];
        $oldimage = $data['oldimg'];


        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileType = $file['type'];


        if (!empty($fileName) && $fileType=="image/jpg" || $fileType=="image/jpeg" || $fileType=="image/png" || $fileType=="image/gif")
        {
            $path = 'public/img/post/';
            unlink($path.$oldimage);
            if (move_uploaded_file($fileTmp,$path.$fileName))
            {
                $sql = "UPDATE post SET title=?,detail=?,categury=?,alt_image=?,tags=?,approve=?,image=? WHERE id=?";
                $value = array($title, $detail, $categury, $alt_image, $tags, $approve, $fileName, $post_id);
                $this->doQuery($sql, $value);
            }
        }
        else
        {
            $sqls = "UPDATE post SET title=?,detail=?,categury=?,alt_image=?,tags=?,approve=? WHERE id=?";
            $values = array($title, $detail, $categury, $alt_image, $tags, $approve, $post_id);
            $this->doQuery($sqls, $values);

        }
    }

    public function getpost()
    {
        $sql = "SELECT * FROM post ORDER BY id DESC";
        $result = $this->select($sql);
        return $result;
    }


    function getCategory()
    {
        $sql = "SELECT * FROM categury";
        $result = $this->select($sql);
        return $result;
    }

    function getPostInfo($postId)
    {

        $sql = "SELECT * FROM post where id=?";
        $result = $this->select($sql, array($postId), 1);
        return $result;
    }

    public function deleteGrouppost($ids)
    {
        $result = '';
        foreach ($ids as $id) {
            $part = 'public/img/post/';
            $image = $this->getPostInfo($id);
            $pic = $image['image'];
            unlink($part . $pic);
            $sql = "DELETE FROM post WHERE id = $id";
            $result = $this->doQuery($sql);
        }
        return $result;
    }

}