<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_adminlogin extends Eloquent {

    protected $table = "user";

    public function checkUser($form)
    {
        $email = $form['email'];
        $password = $form['password'];


        $result = DB::table('user')->where('email','=',$email)->first();
        if($result) {
            // found admin, now check password
            if (Model::password_check($password, $result->password)) {
                // password matches
                print_r_debug_die($result);
            } else {
                // password does not match
                return false;
            }
        }else{
            // email does not found
            die("not email");
        }

//print_r($result[0]->id);die();
        /*if(sizeof($result)>0 and !empty($email) and !empty($password)){
            echo 'correct user pass!';
            Model::sessionInit();
            Model::sessionSet('userId',$result[0]->id);

        }
        else{
            echo 'wrong user pass!';
        }*/


    }
}