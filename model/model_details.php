<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_details extends Eloquent {

    protected $table = 'post';

    public function getdetails($postId)
    {
        return model_details::where('id',$postId)->get();
    }
}