@extends('layout')

@section('content')

    <form action="/laracast/public/tasks/{{$task->id}}/edit" method="post" class="col-sm-8">

        <div class="form-group">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="taskTitle">Task Title</label>
            <input type="text" class="form-control" id="taskTitle" name="body" value="{{$task->body}}">
        </div>
        <div class="form-group">
            <label for="taskStatus">Task Status</label>
            <select class="form-control" id="taskStatus" name="complete" value="{{$task->complete}}">
                @if ($task->complete === 1)
                    <option value="1" selected>Complete</option>
                    <option value="0">Incomplete</option>
                @else
                    <option value="1">Complete</option>
                    <option value="0" selected>Incomplete</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>
    <p>
    <form action="/laracast/public/tasks/{{$task->id}}/delete" method="post" class="col-sm-8">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-primary">Delete</button>

    </form>
    Created at: {{date("F d, Y h:i:s", strtotime($task->created_at))}}</br>
    Updated at: {{$task->updated_at}}</br>
    </p>
    <div class="comments">
        <form action="/laracast/public/tasks/{{$task->id}}/comments" method="post" class="col-sm-8">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea name="body" placeholder="Your comment" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
        <ul class="list-group">
            @foreach($task->comments as $comment)
                <li class="list-group-item">
                    {{$comment->body}}<br>
                    <strong>
                        Created: {{$comment->created_at->diffForHumans()}}
                    </strong>
                </li>
            @endforeach
        </ul>
    </div>
    @include('errors')





@endsection