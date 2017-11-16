<?php

namespace App\Http\Controllers;
use App\Task;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function create(Task $task) {
        $user_id = auth()->id();

        $task->addComment(request('body'), $user_id);
        return back();
    }
}
