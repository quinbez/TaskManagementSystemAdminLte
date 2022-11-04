@extends('layouts.adminlte')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content p-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Members</h3>
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
                                            <th>ID</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Change</th>
                                            <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($members)
                                                @foreach($members as $member)
                                                    <tr>
                                                        <td>{{$member->id}}</td>
                                                        <td>{{$member->role}}</td>
                                                        <td>{{$member->name}}</td>
                                                        <td>{{$member->email}}</td>
                                                        <td>{{$member->phone_number}}</td>
                                                        <td>{{$member->created_at?->diffForHumans()}}</td>
                                                        <td>{{$member->updated_at?->diffForHumans()}}</td>
                                                        <td><a href="{{url("/member/edit/$member->id") }}" style="color:#efef27;">Edit</a></td>
                                                        <td><a href="{{url("/member/delete/$member->id")}}" style="color:red;">Delete</a></td>
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
            $('#memberNav').addClass('menu-open');
            $('#memberNava').addClass('active');
            $('#allMemberNav').addClass('active');
        });
    </script>
@endsection


