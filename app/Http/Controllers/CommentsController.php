<?php

namespace App\Http\Controllers;
use App\Task;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function create(Task $task) {

        $task->addComment(request('body'));
        return back();
    }
}
