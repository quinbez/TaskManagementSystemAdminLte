@extends('user.indexAdminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Completed Tasks</h3>
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
                            <tbody>
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


