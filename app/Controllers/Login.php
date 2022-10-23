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

    //    $auth = new \App\Libraries\Authentication;
    $auth = service('auth');

    $redirect_url = session('redirect_url')??"";
    unset($_SESSION['redirect_url']);

       if($auth->login($email, $password)){
        return redirect()->to($redirect_url)->withInput()->with('info','Login success');
       }

       else{
        return redirect()->back()->withInput()->with('warning','Invalid login');
       }

    }


    public function logout(){

        // $auth = new \App\Libraries\Authentication;
        $auth = service('auth');
        $auth->logout();
        return redirect()->to("login/logoutMessage");

    }

    public function logoutMessage(){
        return redirect()->to("")->with("info","Logout successfull");
    }


}
