@extends('layout')

@section('content')

    @if(auth::check())
        @if($tasks->isEmpty())
            <a href="http://localhost:8080/laracast/public/tasks/create">Create a Task</a>
        @else
            <table class="table table-striped" style="margin-top:50px;"cellpadding="10">
                <thead class="thead-dark">
                <th>Task Name</th>
                <th>Task Status</th>
                <th>Created On</th>
                </thead>
                @foreach ($tasks->reverse() as $task)
                    <tr>
                        @if($task->complete != 1)
                            <td><a href="/laracast/public/tasks/{{$task->id}}">
                                    {{$task->body}}
                                </a></td>
                            <td>Incomplete</td>
                            <td>{{date("F d, Y h:i:s", strtotime($task->created_at))}}</td>
                        @else
                            <td><s><a href="/laracast/public/tasks/{{$task->id}}">
                                        {{$task->body}}
                                    </a></s></td>
                            <td><s>Complete</s></td>
                            <td><s>{{date("F d, Y h:i:s", strtotime($task->created_at))}}</s></td>
                        @endif
                    </tr>
                @endforeach

            </table>
            <a style="background-color: #343a40; border-color: #343a40;" href="http://localhost:8080/laracast/public/tasks" class="btn btn-info">Order By Oldest</a>
            <a style="background-color: #343a40; border-color: #343a40;" href="#" class="btn btn-info">Order By Newest</a>

        @endif
    @else
        <p>Please register for the website to create tasks</p>
    @endif

@endsection