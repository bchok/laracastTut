@extends('layout')

@section('content')

    @if(auth::check())
        @if($tasks->isEmpty())
            <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
        @else
            <table cellpadding="10">
                    <th>Task Name</th>
                    <th>Task Status</th>
                    <th>Created On</th>
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
                            <td>{{date("F d, Y h:i:s", strtotime($task->created_at))}}</td>
                        </tr>
                    @endforeach

            </table>
            <a style="background-color: #343a40; border-color: #343a40;" href="#" class="btn btn-info">Order By Oldest</a>
            <a style="background-color: #343a40; border-color: #343a40;" href="http://localhost:8080/laracast/public/index_reverse" class="btn btn-info">Order By Newest</a>
        @endif
        @else
        <p>Please register for the website to create tasks</p>
    @endif

@endsection
