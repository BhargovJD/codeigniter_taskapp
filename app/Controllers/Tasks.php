<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TaskModel;
        $data = $model->findAll();

        // dd($data);

        return view("Tasks/index.php",['tasks'=>$data]);
    }

    public function show($id)
    {
        $model = new \App\Models\TaskModel;
        $task = $model->find($id);

        // dd($task);

        return view("Tasks/show.php",[
            'task'=>$task
        ]);
    }

    public function new()
    {

        return view("Tasks/new");
    }

    public function create()
    {
        $model = new \App\Models\TaskModel;

       $result = $model->insert([
            'description'=>$this->request->getPost('description')
        ]);
        
        // dd($model->insertID);

        if($result === false){
            // dd($model->errors());
            return redirect()->back()->with('errors',$model->errors())->with('warning','Invalid data')->withInput();;
        }
        else{
            // dd($result);
            return redirect()->to("tasks/show/$result")->with('info','Task created successfully');
        }
    }


    // EDIT 
    public function edit($id)
    {
        $model = new \App\Models\TaskModel;
        $task = $model->find($id);

        return view("Tasks/edit",[
            'task'=>$task
        ]);
    }

    public function update($id)
    {
        $model = new \App\Models\TaskModel;
        $result = $model->update($id,[
            'description'=>$this->request->getPost('description')
        ]);

        if($result){
            return redirect()->to("tasks/show/$id")->with('info','Task edited successfully');
        }
        else{
            return redirect()->back()->with('errors',$model->errors())->with('warning','Invalid data')->withInput();
        }


    }
}
