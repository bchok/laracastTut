@extends('layout')

@section('content')

    @if(auth::check())
        @if($tasks->isEmpty())
            <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
        @else
            <ul>
                    @foreach ($tasks as $task)
                        <li>
                            <a href="/laracast/public/tasks/{{$task->id}}">
                                {{$task->body}}
                            </a>
                        </li>
                    @endforeach

            </ul>
        @endif
        @else
        <p>Please register for the website to create tasks</p>
    @endif

@endsection
