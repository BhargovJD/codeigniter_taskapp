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
}
