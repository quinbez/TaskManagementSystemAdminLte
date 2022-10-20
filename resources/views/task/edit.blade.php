@extends('layouts.admin')

@section('content')

<h3>Edit Task </h3>
<form action="{{ route('updatetask') }}" method="get">
    {{ csrf_field() }}
<div class="row">
    <input type="hidden" name="taskId" value="{{$tasks->id}}">
    <div class="form-group  col-sm-6">
        {!!Form::label('name','Task Name: ')!!}
        {!!Form::text('name',$tasks->name,['class'=>'form-control',"required","minlength"=>"2", "maxlength"=>"50",'title'=>"only alphabets are allowed" ,'pattern'=>"^[a-zA-Z ]*$"])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('status','Status')!!}
        {!!Form::select('status',[$tasks->status=>$tasks->status,'on_progress'=>'On Progress','completed'=>'Completed' ],null, ['class'=>'form-control', "required"])!!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6" >
    {!!Form::label('start_date','Start Date: ')!!}
    {!!Form::text('start_date',$tasks->start_date,['id'=> 'fromDatePicker','class'=>'form-control','autocomplete'=>'off', "required"])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('end_date','Deadline: ')!!}
        {!!Form::text('end_date',$tasks->end_date,['id'=> 'toDatePicker','class'=>'form-control','autocomplete'=>'off', "required"])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label class="project_id">Project</label>
        <select name="project_id" id="project" class="form-control" required="true">
            <option  disabled selected hidden value="{{$tasks->project->title}}">{{$tasks->project->title}}</option>
            @foreach ($project as $pro)
                <option value="{{$pro->id}}">{{$pro->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label class="user_id">Assigned to</label>
        <select name="user_id" id="user" class="form-control" required="true">
            <option disabled selected hidden value="{{$tasks->member->name}}">{{$tasks->member->name}}</option>
            @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="d-grid gap-2">
    <div class="form-group col-sm-6" >
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',$tasks->description,['class'=>'form-control', 'rows'=>'3','required','pattern'=>"^[a-zA-Z - 0-9]*$", "maxlength"=>"150"])!!}
    </div>
</div>
<div class="d-grid gap-2">
    <div class="row w-100" style="justify-content: between">
        <div class="form-group d-flex col-sm-3 p-4">
            {!!Form::submit('Edit', ['class'=>'btn addcolor me-4 col-5'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor col-5'])!!}
         </div>
        <div class="form-group col-sm-6 p-4 backbtn2">
            <a class="" href="{{route('indextask')}}">Back</a>
        </div>

    </div>
</div>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
