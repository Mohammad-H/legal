<?php
class Model2 {

    public static $conn = '';

    function __construct()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'legal';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*if (function_exists('jdate') == false) {
            require('public/jdf/jdf.php');
        }*/

    }

    public static function select($sql, $values = array(), $fetch = '', $fetchStyle = PDO::FETCH_ASSOC)
    {

        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == '') {
            $result = $stmt->fetchAll($fetchStyle);
        } else {
            $result = $stmt->fetch($fetchStyle);
        }
        return $result;
    }

    function doQuery($sql, $values = array())
    {

        $stmt = self::$conn->prepare($sql);

        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        if($stmt->execute())
        {
            return true;
        }else{
            return false;
        }

    }


    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;


    }

    public static function sessionInit()
    {

        @session_start();
    }

    public static function sessionSet($name, $value)
    {

        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {

        if (isset($_SESSION[$name])) {

            return $_SESSION[$name];
        } else {
            return false;
        }
    }


    public static function getUserLevel()
    {

        self::sessionInit();
        $userId = self::sessionGet('userId');
        $sql="SELECT * FROM user WHERE id=?";
        $userInfo=self::select($sql,array($userId),1);
        return $userInfo['access'];

    }
}