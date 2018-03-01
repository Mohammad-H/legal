<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_admindashboard extends Eloquent {
	// 1000 row
	// protected $table = "user_details";

	// 5000 row
	 protected $table = "user_details1";
    // protected $hidden = ['password','status'];
	 
	// 18000 row
	 // protected $table = "nap_nap_loghat";

    public function __construct()
    {
//        parent::__construct();
    }

    public function getAllRow()
    {
    	return model_admindashboard::all();
    }
}