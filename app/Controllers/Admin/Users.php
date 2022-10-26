<?php

namespace App\Controllers\Admin;
use App\Entities\User;

use \App\Controllers\BaseController;
class Users extends BaseController
{
    private $model;
    public function __construct(){
        $this->model = new \App\Models\UserModel;
    }

    // Show all users
    public function index()
    {
        $users = $this->model->orderBy('id')->paginate(2);

        return view('Admin/Users/index',[
            'users'=>$users,
            'pager'=>$this->model->pager
        ]);
    }

    // Show a specific user

    public function show($id)
    {
        $user = $this->getUserOr404($id);

        return view("Admin/Users/show",[
            'user'=>$user
        ]);
    } 


    private function getUserOr404($id){

        $user = $this->model->where('id',$id)->first();

        if($user === null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id not found");
        }

        return $user;
    }

    // Create user form
    public function new()
    {

        $user = new User;

        return view("Admin/Users/new",[
            'user'=>$user
        ]);
    }

    // Create user
    public function create()
    {

        $user = new User($this->request->getPost());
        

        if($this->model->insert($user)){
            return redirect()->to("admin/users/show/{$this->model->insertID}")->with('info','User created successfully');
        }
        else{
            return redirect()->back()->with('errors',$this->model->errors())->with('warning','Invalid data')->withInput();
        }
    }

    // Edit view
        public function edit($id)
        {
            $user = $this->getUserOr404($id);
    
            return view("Admin/Users/edit",[
                'user'=>$user
            ]);
        }

        // Update
        public function update($id)
        {
    
            $user = $this->getUserOr404($id);
    
            $post = $this->request->getPost();

            if(empty($post['password'])){
                $this->model->disablePasswordValidation();
                unset($post['password']);
                unset($post['password_confirmation']);
            }
    
            $user->fill($post);
    
    
            if(!$user->hasChanged()){
                return redirect()->back()->with('warning','Noting to update')->withInput(); 
            }
    
           if($this->model->save($user)){
                return redirect()->to("admin/users/show/$id")->with('info','User edited successfully');
                // echo "chn";
            }
            else{
                return redirect()->back()->with('errors',$this->model->errors())->with('warning','Invalid data')->withInput();
            }
    
    
        }

        // Delete
        public function delete($id){
            $user = $this->getUserOr404($id);
    
            if($this->request->getMethod()==="post"){
    
                $this->model->delete($id);
    
                return redirect()->to('admin/users')->with('info','User deleted');
    
            }
    
            return view('Admin/Users/delete',[
                'user'=>$user
            ]);
    
        }
}
