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
                            <h3 class="card-title">Expiring Tasks</h3>
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
                                    {{-- <th>Update</th> --}}

                                </tr>
                            </thead>
                            <tbody
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
                                                {{-- <td><a href="{{url("status/edit/$task->id")}}" style="color:#efef27;">Edit</a></td> --}}

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

@endsection


