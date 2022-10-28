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
                            <h3 class="card-title">All Categories</h3>
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
                                    <th>Type</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Update</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories)
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->type}}</td>
                                                <td>{{$category->created_at->diffForHumans()}}</td>
                                                <td>{{$category->updated_at->diffForHumans()}}</td>
                                                <td><a href="{{url("/category/edit/$category->id")}}" style= "color:#efef27;">Edit</a></td>
                                                <td><a href="{{url("/category/delete/$category->id")}}" style="color:red;">Delete</a></td>
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
            $('#categNav').addClass('menu-open');
            $('#categNava').addClass('active');
            $('#allcategNav').addClass('active');
        });
    </script>
@endsection


