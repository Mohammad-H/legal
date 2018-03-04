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

    // encryption

    public static function password_encrypt($password) {
        // Tells PHP to use Blowfish with a "cost" of 10
        $hash_format = "$2y$10$";
        // Blowfish salts should be 22-characters or more
        $salt_length = 22;
        $salt = self::generate_salt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($password, $format_and_salt);
        return $hash;
    }

    public static function generate_salt($length) {
        // Not 100% unique, not 100% random, but good enough for a salt
        // MD5 returns 32 characters
        $unique_random_string = md5(uniqid(mt_rand(), true));

        // Valid characters for a salt are [a-zA-Z0-9./]
        $base64_string = base64_encode($unique_random_string);

        // But not '+' which is valid in base64 encoding
        $modified_base64_string = str_replace('+', '.', $base64_string);

        // Truncate string to the correct length
        $salt = substr($modified_base64_string, 0, $length);

        return $salt;
    }

    public static function password_check($password, $existing_hash) {
        // existing hash contains format and salt at start
        $hash = crypt($password, $existing_hash);
        if ($hash === $existing_hash) {
            return true;
        } else {
            return false;
        }
    }
}