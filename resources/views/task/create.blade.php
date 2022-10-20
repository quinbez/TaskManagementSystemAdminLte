@extends('layouts.admin')

@section('content')

<h3>Assign Task </h3>
<form action="{{ route('storetask') }}" id="createTaskForm" method="post">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Task Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control','required','title'=>"only alphabets are allowed","minlength"=>"2", "maxlength"=>"50" ,'pattern'=>"^[a-zA-Z -]*$"])!!}
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
</div>

<div class="row">
    <div class="form-group col-sm-6" >
        {!!Form::label('start_date','Start Date: ')!!}
        {!!Form::text('start_date',null,['id'=> 'fromDatePicker','class'=>'form-control','autocomplete'=>'off', "required"])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('end_date','End Date: ')!!}
        {!!Form::text('end_date',null,['id'=> 'toDatePicker','class'=>'form-control','autocomplete'=>'off', "required"])!!}
    </div>
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
<div class="d-grid gap-2">
    <div class="form-group col-sm-6" >
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',null,['class'=>'form-control', 'rows'=>'3','required','pattern'=>"^[a-zA-Z - 0-9]*$", "maxlength"=>"150"])!!}
    </div>
</div>



<div class="d-grid gap-2">
    <div class="row w-100" style="justify-content: right">
        <div class="form-group d-flex col-sm-3 p-4">
            {!!Form::submit('Assign', ['class'=>'btn addcolor me-4 col-5'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor col-5'])!!}
        </div>
    </div>
</div>
</form>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>

                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
{{-- <script src="{{ url('js/bootstrapValidator.min.js') }}"></script> --}}

<script>
</script>
{{-- <script>
$(function(){
    $('#createTaskForm').bootstrapValidator({
        message: "This value is not valid",
        fields:{
            name:{
                    message:"Task name is not valid",
                    validators:{
                        notEmpty:{
                            message:"Task name is required and can't be empty"
                        },
                    stringLength:{
                        min:2,
                        max:25,
                        message:"Task name must be morethan two and lessthan 30 characters long"
                    },
                    regexp:{
                        regexp:/^[a-zA-Z" "\.]+$/,
                        message:"Task name can only consist of alphabets"
                    }
                }
            },
        }
    });
});
</script> --}}
@endsection
