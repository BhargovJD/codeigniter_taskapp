<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index()
    {
        $data = [
            ['id'=>1,'desc'=>'First task'],
            ['id'=>2,'desc'=>'Second task']
        ];
        return view("Tasks/index.php",['tasks'=>$data]);
    }
}
