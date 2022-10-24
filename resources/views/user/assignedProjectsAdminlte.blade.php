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
                                <th>Id</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th> Team-Members</th>
                                <th>Start-Date</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($projects)
                                    @foreach($projects->unique('id') as $project)
                                        <tr>
                                            <td>{{$project->id}}</td>
                                            <td><a href="{{route('showdetail', $project->id)}}">{{$project->title}}</a></td>
                                            <td>{{$project->category?->type }}</td>
                                            <td>{{$project->description}}</td>
                                            {{-- <td>{{implode(' , ',$project->users()->pluck('name')->toArray())}}</td> --}}
                                            <td>
                                                @foreach ($project->users()->pluck('name', 'id') as $id => $name)
                                                <a href="{{route('teamdetail',[ $project->id, $id])}}">{{$name}}</a>,

                                                @endforeach
                                            </td>

                                            <td>{{$project->start_date}}</td>
                                            <td>{{$project->deadline}}</td>
                                            <td>{{$project->status}}</td>
                                            <td>{{$project->created_at->diffForHumans()}}</td>
                                            <td>{{$project->updated_at->diffForHumans()}}</td>
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


