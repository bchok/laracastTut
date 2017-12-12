@extends('layout')

@section('content')

    @if(auth::check())
        @if($tasks->isEmpty())
            <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
        @else
            <table cellpadding="10">
                    @foreach ($tasks as $task)
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
        @endif
        @else
        <p>Please register for the website to create tasks</p>
    @endif

@endsection
