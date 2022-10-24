@extends('layouts.admin')

@section('content')

<h3>Expiring Tasks</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th>Start</th>
            <th>Deadline</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
            <th>Update</th>
            <th>Remove</th>

        </tr>
    </thead>
    @if($tasks)
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->project?->title}}</td>
                    <td>{{$task->member?->name}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td>{{$task->created_at?->diffForHumans()}}</td>
                    <td>{{$task->updated_at?->diffForHumans()}}</td>
                    <td>{{$task->status}}</td>
                    <td><a href="{{url("/task/edit/$task->id")}}" style="color:#efef27;">Edit</a></td>
                    <td><a href="{{url("/task/delete/$task->id")}}" style="color:red;">Delete</a></td>


                </tr>
            @endforeach
        @endif

    </tbody>

@endsection
