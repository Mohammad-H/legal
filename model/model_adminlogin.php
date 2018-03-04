<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class model_adminlogin extends Eloquent {

    protected $table = "user";

    public function checkUser($form)
    {
        if (empty($form['email']) || empty($form['password']))
        {
            die("email or password empty");
        }

        $email = $form['email'];
        $password = $form['password'];

        $result = self::where('email','=',$email)->first();

        if($result)
        {
            // found admin, now check password
            if (Model::password_check($password, $result->password))
            {
                // password matches
                Model::sessionInit();
                Model::sessionSet('userId',$result->id);
                Model::sessionSet('userAccess',$result->access);
//                print_r_debug_die($result);
            } else {
                // password does not match
                die("password not found");
            }
        }else{
            // email does not found
            die("not email");
        }
    }
}