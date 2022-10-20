@extends('user.index')

@section('content')

<h3>Completed Tasks</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th>Start</th>
            <th>End</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
        </tr>
    </thead>
    @if($tasks-> count() != 0)
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    {{-- <td></td> --}}
                    <td>{{$task->project?->title}}</td>
                    <td>{{$task->member?->name}}</td>
                    {{-- <td></td> --}}
                    <td>{{$task->description}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td>{{$task->created_at->diffForHumans()}}</td>
                    <td>{{$task->updated_at->diffForHumans()}}</td>
                    <td>  @if($task->status == 'pending')
                        <a href="{{url("onprogress/update/$task->id")}}">Change to on progress</a>
                        @elseif($task->status == 'on_progress')
                        <a href="{{url("completed/update/$task->id")}}">Change to completed</a>
                        @else
                            no action
                        @endif</td>

                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6"><h5 style="color:grey;">No tasks completed </h5></td>
            </tr>
        @endif

    </tbody>

@endsection
