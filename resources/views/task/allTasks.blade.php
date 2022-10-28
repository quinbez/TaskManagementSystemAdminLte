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
                            @if (\Session::has('success'))
                            <div class="alert alert-<?php echo 'success'; ?>" role="alert" id="artMsg">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden='true'>&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-<?php echo 'danger'; ?>" role='alert' id='artMsg'>
                                <button type='button' class='close' data-bs-dismiss='alert'>
                                    <span aria-hidden='true'>&times;</span>
                                    <span class='sr-only'>Close</span>
                                </button>{!! \Session::get('error') !!}
                            </div>
                        @endif
                            <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Project</th>
                                    <th>Assigned To</th>
                                    <th>Description</th>
                                    <th>Start date</th>
                                    <th>Deadline</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
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
            $('#taskNav').addClass('menu-open');
            $('#taskNava').addClass('active');
            $('#alltasktNav').addClass('active');
        });
    </script>
@endsection


