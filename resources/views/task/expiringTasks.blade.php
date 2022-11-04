@extends('layouts.adminlte')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content p-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Expiring Tasks</h3>
                                </div>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Project</th>
                                            <th>Assigned</th>
                                            <th>Description</th>
                                            <th>Start</th>
                                            <th>Deadline</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
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
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
