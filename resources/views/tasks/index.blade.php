@extends('layout')

@section('content')

    @if($tasks->isEmpty())
        <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
    @else
        @foreach ($tasks as $task)
            <li>
                <a href="/laracast/public/tasks/{{$task->id}}">
                    {{$task->body}}
                </a>
            </li>
        @endforeach
    @endif
@endsection
