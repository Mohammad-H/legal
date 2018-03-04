<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_admindashboard extends Eloquent {

     // 1000 row
	 protected $table = "user_details";
    // protected $hidden = ['password','status'];

    public function __construct()
    {
//        parent::__construct();
    }

    public function getAllRow()
    {
    	return self::all();
    }
}