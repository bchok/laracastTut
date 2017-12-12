<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::all();
        //$this->sort = $sort;
        //$userID = auth()->id();
        //$tasks = Task::where('user_id', $userID)->get();
        /**if($sort == 'asc') {
            $tasks = Task::orderBy('created_at', 'asc')->where('user_id', $userID)->get();
        }else {
            $tasks = Task::orderBy('created_at', 'desc')->where('user_id', $userID)->get();
        }**/
        $userID = auth()->id();
        $user = User::find($userID);
        if($user != null) {
            $tasks = $user->getTasks();
        }else
            $tasks = Task::all();
        return view('tasks.index', compact('tasks'));

    }
    public function index_reverse(){
        $userID = auth()->id();
        $user = User::find($userID);
        if($user != null) {
            $tasks = $user->getTasks();
        }else
            $tasks = Task::all();
        return view('tasks.index_reverse', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task)
    {
        $this->validate(request(), [
            'body' => 'required|min:5',
            'complete' => 'required'
        ]);

        $task = new Task;
        $task->user_id = auth()->id();
        $task->body = request('body');
        $task->complete = request('complete');
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        $this->validate(request(), [
            'body' => 'required|min:5',
            'complete' => 'required'
        ]);

        $task->body = request('body');
        $task->complete = request('complete');
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        // redirect
        return redirect('/tasks');
    }
}
