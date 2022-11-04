@extends('user.indexAdminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content p-4">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Pending Tasks</h2>
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
                                @if($tasks->count() != 0)
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
                                                <td>
                                                    {{-- @if($task->status == 'pending') --}}
                                                    <a href="{{url("onprogress/update/$task->id")}}">Change to on progress</a>
                                                    {{-- @elseif($task->status == 'on_progress') --}}
                                                    {{-- <a href="{{url("completed/update/$task->id")}}">Change to completed</a> --}}
                                                    {{-- @else --}}
                                                        {{-- no action --}}
                                                    {{-- @endif --}}



                                                </td>

                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6"><h5 style="color:grey;">No pending tasks</h5></td>
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
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#userTaskNav').addClass('menu-open');
            $('#userTaskNava').addClass('active');
            $('#userPendingNava').addClass('active');
        });
    </script>
@endsection


