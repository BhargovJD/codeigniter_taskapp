<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function new()
    {
        return view("Login/new");
    }

    public function create()
    {
       $email = $this->request->getPost('email');
       $password = $this->request->getPost('password');

    //    echo($password);
    //    return;

       $model = new \App\Models\UserModel;
       $user = $model->where('email',$email)->first();

       if($user ===  null){
        return redirect()->back()->withInput()->with('warning','User not found');
       }

       else{

        if(password_verify($password, $user->password_hash)){

            // echo "Login ok";
            $session = session();
            $session->regenerate();
            $session->set('user_id_session', $user->id);

            return redirect()->to("")->withInput()->with('info','Login success');

        }

        else{
            return redirect()->back()->withInput()->with('warning','Incorect password');
        }
       }

    }

    public function logout(){
        session()->destroy();
        return redirect()->to("login/logoutMessage");

    }

    public function logoutMessage(){
        return redirect()->to("")->with("info","Logout successfull");
    }


}
