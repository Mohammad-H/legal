<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_adminregister extends Eloquent{

    protected $table = "user";
    protected $guarded = [];
    public $timestamps = false;

    public function register($form)
    {
        $email = $this->emailCurrent($form['email']);
        if ($email)
        {
            die("email current");
        }
        $password = Model::password_encrypt($form['password']);
        $add = self::create([
            "email"=>$form['email'],
            "password"=>$password,
            "access"=>$form['access']
        ]);

        return $add;
    }

    public function emailCurrent($email=null){
        $email = self::where('email','=',$email)->first();
        if($email)
        {
            return true;
        }else{
            return false;
        }
    }

}