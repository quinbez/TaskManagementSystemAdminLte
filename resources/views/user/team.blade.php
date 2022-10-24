@extends('user.index')

@section('content')

<h3>{{$project->title}}</h3>
<table class='table'>
    <thead>
        <tr>
            <th>User-Id</th>
            <th>Team-Members</th>
            <th>Task-Name</th>
            <th>Start-Date</th>
            <th>Deadline</th>
            <th>Created</th>
            <th>Updated</th>


        </tr>
    </thead>
    <tbody>
        @if($project->tasks->count() != 0)
            @foreach($project->tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->member->name}}</td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td>{{$task->created_at?->diffForHumans()}}</td>
                    <td>{{$task->updated_at?->diffForHumans()}}</td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6"><h5 style="color:grey;">No task assigned for this project</h5></td>
            </tr>
        @endif
    </tbody>
</table>
<a href="{{route('userproject')}}" class="backbtn"> Back</a>

@endsection
