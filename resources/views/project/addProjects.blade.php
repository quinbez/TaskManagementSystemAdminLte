@extends('layouts.adminlte')

<link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <form action="{{ route('storeproj') }}" method="post" id="createMemberForm" class="p-4">

                <h3>Add Project</h3>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-danger p-4">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter project title">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="category_id">Category </label>
                                <select name="category_id" id="category" class="form-control" required="true">
                                    <option disabled selected hidden value="">Choose Option</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->type}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Start Date</label>
                                <input  type = "date"  name="start_date" id= 'fromDatePicker' autocomplete ='off' class='form-control' required="true">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>End Date</label>
                                <input  type = "date"  name="deadline" id= 'toDatePicker' autocomplete ='off' class='form-control' required="true">
                            </div>
                                      <div class="form-group">
                                        <label>Description</label>
                                        <input type="textarea" name="description" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="team_member">Team members</label>
                                        <select class="form-control select2" name="team_member[]" id="team_member" multiple="multiple" required="true" style="width:100%;" data-placeholder="select team members">
                                            @foreach ($teams as $team)
                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

            </form>
        </div>
    </div>


<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $('.select2').select2({
                    width: 'element'
                });
    </script>
 @endsection

