@extends('user.indexAdminlte')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tasks on a project</h3>
                                </div>
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                            <th>User-Id</th>
                                            <th>Assigned to</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </section>
        </div>
    </div>

@endsection


