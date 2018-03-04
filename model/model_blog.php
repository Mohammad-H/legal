<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class model_blog extends Eloquent{
    protected $table= "post";

    public function getuserlimit($start,$count)
    {
        return self::take($count)->skip($start)->get();
    }

    public function countuser()
    {
        return self::count();
    }
}