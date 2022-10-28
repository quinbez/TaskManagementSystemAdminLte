@extends('layouts.adminlte')

<link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <form action="{{ route('storetask') }}" method="post" class="p-4">

                <h3>Assign Task</h3>
                {{ csrf_field() }}

                <div class="form-group col-sm-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter task name">
                </div>
                <div class="form-group col-sm-6">
                    <label class="project_id">Project </label>
                    <select name="project_id" id="project" class="form-control" required="true">
                        <option disabled selected hidden value="">Choose Option</option>
                        @foreach ($project as $pro)
                            <option value="{{$pro->id}}">{{$pro->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="user_id">Assigned to </label>
                        <select name="user_id" id="user" class="form-control" required="true">
                            <option disabled selected hidden value="">Choose Option</option>
                            @foreach ($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label>Start Date</label>
                    <input  type = "text"  name="start_date" id= 'fromDatePicker' autocomplete ='off' class='form-control' required="true">
                </div>
                <div class="form-group col-sm-6">
                    <label>End Date</label>
                    <input  type = "text"  name="deadline" id= 'toDatePicker' autocomplete ='off' class='form-control' required="true">
                </div>
                          <div class="form-group col-sm-6">
                            <label>Description</label>
                            <input type="textarea" name="description" class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
                        <script>
                            $(document).ready(function() {
                                $('#taskNav').addClass('menu-open');
                                $('#taskNava').addClass('active');
                                $('#assigntasktNav').addClass('active');
                            });
                        </script>
 @endsection

