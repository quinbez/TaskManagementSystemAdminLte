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
                            <h2 class="card-title">Assigned Projects</h2>
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
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#userAssignedProjNav').addClass('active');
        });
    </script>
@endsection



