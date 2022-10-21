<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function new()
    {
        return view("Signup/new");
    }

    public function create()
    {

        $user = new \App\Entities\User($this->request->getPost());
        
        $model = new \App\Models\UserModel;

        // $model->insert($user);

        if($model->insert($user)){
            // echo "Signed up";
            return redirect()->to("signup/success");
        }
        else{
            return redirect()->back()
            ->with('errors',$model->errors())
            ->with('warning','Invalid data')
            ->withInput();
        }
        

    }

    public function success(){
        return view('Signup/success');
    }

}
