@extends('user.index')

@section('content')

    <h3>{{ $user?->name }}</h3>
    <table class='table'>
        <thead>
            <tr>
                <th>Task-Id</th>
                <th>Task-Name</th>
                <th>Start-Date</th>
                <th>Deadline</th>
                <th>Created</th>
                <th>Updated</th>


            </tr>
        </thead>
        <tbody>
            @if ($tasks->count() != 0)
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->start_date }}</td>
                        <td>{{ $task->end_date }}</td>
                        <td>{{ $task->created_at?->diffForHumans() }}</td>
                        <td>{{ $task->updated_at?->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><h5 style="color:grey;">User has no task</h5></td>
                </tr>
            @endif
            
        </tbody>
    </table>
    <a href="{{route('userproject')}}" class="backbtn"> Back</a>

    @endsection

 
