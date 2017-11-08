<?php

namespace App\Http\Controllers;

use App\Task;


class oldtaskscontroller extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task){

        return view('tasks.show', compact('task'));
    }

    public function create(){

        return "Hello World";
    }
}
