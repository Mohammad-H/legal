<?php
//use Illuminate\Database\Capsule\Manager as Capsule;
class DB extends Illuminate\Database\Capsule\Manager {};

$capsule = new DB;

$capsule->addConnection([
    'driver'    => DRIVER,// Mysql
    'host'      => HOST,// 'localhost'
    'database'  => DATABASE_NAME,// Database Name
    'username'  => USER_NAME,// User Name
    'password'  => PASSWORD,// Password
    'charset'   => 'utf8',
    'collation' => 'utf8_persian_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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

class Model
{
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
        $userInfo = DB::table('user')->where([
            ['id','=',$userId],
        ])->get();

        return $userInfo[0]->access;

    }
}