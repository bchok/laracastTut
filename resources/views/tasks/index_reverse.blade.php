@extends('layout')

@section('content')

    @if(auth::check())
        @if($tasks->isEmpty())
            <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
        @else
            <table cellpadding="10">
                @foreach ($tasks->reverse() as $task)
                    <tr>
                        <td><a href="/laracast/public/tasks/{{$task->id}}">
                                {{$task->body}}
                            </a></td>
                        @if($task->complete != 1)
                            <td>Incomplete</td>
                        @else
                            <td>Complete</td>
                        @endif
                        <td>{{$task->created_at}}</td>
                    </tr>
                @endforeach

            </table>
            <a href="http://localhost:8080/laracast/public/tasks" class="btn btn-info">Order By Oldest</a>
            <a href="#" class="btn btn-info">Order By Newest</a>
        @endif
    @else
        <p>Please register for the website to create tasks</p>
    @endif

@endsection