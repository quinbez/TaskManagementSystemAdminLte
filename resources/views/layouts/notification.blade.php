@extends('layouts.admin')

@section('content')

<h3>Notifications</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Start</th>
            <th>End</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
    @if($tasks)
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}} @if($task->on_progress == 0 || $task->completed == 0) new @endif</td>
                    <td>{{$task->project?->title}}</td>
                    <td>{{$task->member?->name}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td>{{$task->created_at?->diffForHumans()}}</td>
                    <td>{{$task->updated_at?->diffForHumans()}}</td>
                    <td>{{$task->status}}</td>
                </tr>
            @endforeach
        @endif

    </tbody>

@endsection
