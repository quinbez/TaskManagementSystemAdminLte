@extends('user.index')

@section('content')
<h3>Edit Status </h3>

<form action="{{ route('onprogressupdate') }}" method="get">
    {{ csrf_field() }}
<div class="row">
    <input type="hidden" name="onprogressId" value="{{$tasks->id}}">
    <div class="form-group col-sm-6">
        {!!Form::label('status','Status')!!}
        {!!Form::select('status',[''=>'Choose Options','pending'=>'Pending','on_progress'=>'On Progress','completed'=>'Completed' ],null, ['class'=>'form-control'])!!}
    </div>
    <div class="row" style="justify-content: left">
        <div class="form-group col-sm-3 p-4">
            {!!Form::submit('Edit', ['class'=>'btn addcolor'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
        </div>
        <div class="form-group col-sm-6 p-4 backbtn2">
            <a class="" href="{{route('onprogress')}}">Back</a>
        </div>
    </div>
</div>
@endsection
