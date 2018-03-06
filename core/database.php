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