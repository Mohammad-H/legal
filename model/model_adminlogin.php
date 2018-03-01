<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_adminlogin extends Eloquent {

    protected $table = "user";

    public function checkUser($form)
    {
        $email = $form['email'];
        $password = md5($form['password']);

        $result = DB::table('user')->where([
            ['email','=',$email],
            ['password','=',$password],
        ])->get();
//print_r($result[0]->id);die();
        if(sizeof($result)>0 and !empty($email) and !empty($password)){
            echo 'correct user pass!';
            Model::sessionInit();
            Model::sessionSet('userId',$result[0]->id);

        }
        else{
            echo 'wrong user pass!';
        }


    }
}