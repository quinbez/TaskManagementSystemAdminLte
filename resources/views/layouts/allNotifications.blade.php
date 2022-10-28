@extends('layouts.adminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notifications</h3>
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
                            </table>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
          </section>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#allnotiftNav').addClass('active');
        });
    </script>
@endsection


