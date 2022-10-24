@extends('layouts.indexAdminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Tasks</h3>
                            <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
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
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
          </section>
        </div>
    </div>

@endsection


