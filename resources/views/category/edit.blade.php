@extends('layouts.admin')

@section('content')
{{-- <link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}"> --}}

<h3>Edit Category</h3>
<form action="{{route('updatecateg')}}" method="get" id="#editCategoryForm">
{{ csrf_field() }}
<div class="row d-grid gap-2">
    <input type="hidden" name="categoryId" value="{{$categories->id}}">
    <div class="form-group col-6">
        {!!Form::label('type','Type: ')!!}
        {!!Form::text('type',$categories->type,['class'=>'form-control',"required","minlength"=>"3", "maxlength"=>"50",'title'=>"only alphabets are allowed" ,'pattern'=>"^[a-zA-Z -]*$"])!!}
    </div>
    <div class="row w-100" style="justify-content: between">
        <div class="form-group d-flex col-sm-3 p-4">
            {!!Form::submit('Edit', ['class'=>'btn addcolor me-4 col-5'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor col-5'])!!}
        </div>
        <div class="form-group col-sm-6 p-4 backbtn2">
            <a class="" href="{{route('indexcategory')}}">Back</a>
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
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>


   
@endsection

