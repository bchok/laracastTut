@extends('layout')

@section('content')

    <form action="/laracast/public/tasks" method="post" class="col-sm-8">

        <div class="form-group">
            {{ csrf_field() }}
            <label for="taskTitle">Task Title</label>
            <input type="text" class="form-control" id="taskTitle" name="body" required>
        </div>
        <div class="form-group">
            <label for="taskStatus">Task Status</label>
            <select class="form-control" id="taskStatus" name="complete" selected="0" required>
                <option value="0">Incomplete</option>
                <option value="1">Complete</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>

    </form>

    @include('errors')

@endsection

