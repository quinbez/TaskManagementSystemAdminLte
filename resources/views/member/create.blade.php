@extends('layouts.admin')

@section('content')
{{-- <link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}"> --}}

<h3>Create Member</h3>
<form action="{{ route('store') }}" method="post" id="createMemberForm">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Full Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control',"required","minlength"=>"3", "maxlength"=>"50",'title'=>"only alphabets are allowed" ,'pattern'=>"^[a-zA-Z -]*$"])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('email','Email: ')!!}
        {!!Form::email('email',null,['class'=>'form-control',"required"])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('phone_number','Phone: ')!!}
        {!!Form::text('phone_number',null,['class'=>'form-control',"required",'pattern'=>"^[0-9]*$", "minlength"=>"10", "maxlength"=>"13"])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('role','Role: ')!!}
        {!!Form::select('role',['member'=>'Member','admin'=>'Admin'],null,['class'=>'form-control', "required"])!!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <div class="form-group col-sm-6">
            {!!Form::label('password','Password: ')!!}
            {!!Form::password('password', ['class'=>'form-control',"required", "minlength"=>"8"])!!}
        </div>
    </div>
</div>
<div class="row w-100" style="justify-content: right">
    <div class="form-group d-flex col-sm-3 p-4">
        {!!Form::submit('+ Add', ['class'=>'btn addcolor me-4 col-5'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor col-5'])!!}
    </div>
</div>
</form>

@if(count($errors) > 0)
    <div class="alert alert-danger" style="width:450px;">
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

{{-- <script src="{{ url('js/bootstrapValidator.min.js') }}"></script> --}}
{{-- <script>
    $(function(){
        $('#createMemberForm').bootstrapValidator({
            message: "This value is not valid",
            fields:{
                name:{
                        message:"Full name is not valid",
                        validators:{
                            notEmpty:{
                                message:"Full name is required and can't be empty"
                            },
                        stringLength:{
                            min:2,
                            max:25,
                            message:"Full name must be morethan two and lessthan 30 characters long"
                        },
                        regexp:{
                            regexp:/^[a-zA-Z" "-\.]+$/,
                            message:"Full name can only consist of alphabets"
                        }
                    }
                },
            }
        });
    });
    </script> --}}
@endsection

