<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_admindashboard extends Eloquent {

     // 1000 row
	 protected $table = "user_details1";
	 protected $hidden=['password'];
	 protected $guarded = [];
    // protected $hidden = ['password','status'];

    public function getAllRow()
    {
        return self::all()->toArray();
    }

    public function countcol()
    {
        $e = Model::$conn->prepare("select * from `user_details1`");
        $e->execute();
        return $e->columnCount();
    }
}