<?php

namespace App\Controllers;
use App\Entities\Task;

class Tasks extends BaseController
{
    private $model;
    private $current_user;

    public function __construct(){
        $this->model = new \App\Models\TaskModel;
        $this->current_user = service('auth')->getCurrentUser();
    }

    public function index()
    {
        // $auth = service('auth');
        // $user = $auth->getCurrentUser();

        $data = $this->model->getTasksByUserId($this->current_user->id);

        // dd($data);

        return view("Tasks/index.php",[
            'tasks'=>$data,
            'pager'=>$this->model->pager,

        ]);
    }

    public function show($id)
    {
        $task = $this->getTaskOr404($id);

        return view("Tasks/show.php",[
            'task'=>$task
        ]);
    }

    public function new()
    {

        $task = new Task;

        return view("Tasks/new",[
            'task'=>$task
        ]);
    }

    public function create()
    {

        $task = new Task($this->request->getPost());

        // $auth = service('auth');
        // $user = $auth->getCurrentUser();

        $task->user_id=$this->current_user->id;


        // $result = $model->insert($task);
        

        if($this->model->insert($task)){
            return redirect()->to("tasks/show/{$this->model->insertID}")->with('info','Task created successfully');
        }
        else{
            return redirect()->back()->with('errors',$this->model->errors())->with('warning','Invalid data')->withInput();
        }
    }


    // EDIT 
    public function edit($id)
    {
        $task = $this->getTaskOr404($id);

        return view("Tasks/edit",[
            'task'=>$task
        ]);
    }

    public function update($id)
    {

        $task = $this->getTaskOr404($id);

        $post = $this->request->getPost();
        unset($post['user_id']);

        $task->fill($post);


        if(!$task->hasChanged()){
            return redirect()->back()->with('warning','Noting to update')->withInput(); 
        };

        // $model->save($task);

        if($this->model->save($task)){
            return redirect()->to("tasks/show/$id")->with('info','Task edited successfully');
        }
        else{
            return redirect()->back()->with('errors',$this->model->errors())->with('warning','Invalid data')->withInput();
        }


    }

    public function delete($id){
        $task = $this->getTaskOr404($id);

        if($this->request->getMethod()==="post"){

            $this->model->delete($id);

            return redirect()->to('tasks')->with('info','Task deleted');

        }

        return view('Tasks/delete',[
            'task'=>$task
        ]);

    }

    private function getTaskOr404($id){
        // $auth = service('auth');
        // $user = $auth->getCurrentUser();

        $task = $this->model->getTaskByUserId($id,$this->current_user->id);
        if($task === null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
        }

        return $task;
    }
}
