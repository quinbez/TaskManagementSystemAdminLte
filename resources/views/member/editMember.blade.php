@extends('layouts.adminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <form action="{{ route('update') }}" method="post" id="createMemberForm" class="p-4">
                <h3>Edit Member</h3>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-danger p-4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="hidden" value="{{$members->id}}" name="memberId">
                                <input type="text" value="{{ $members->name}}" name="name" class="form-control" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email"  value="{{ $members->email}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Role </label>
                                <select name ='role' class='form-control' required = 'true'>
                                    <option selected hidden value = "{{ $members->id}}">{{ $members->role }}</option>
                                    <option value = 'member'>Member</option>
                                    <option value = 'admin'>Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" value="{{ $members->phone_number}}" name="phone_number" class="form-control"
                                        data-inputmask='"mask": "9999999999"' data-mask>
                                </div>
                            </div>
                            <div class="form-group py-3">
                                <button type="submit" class="btn btn-primary  mr-4 col-3">Edit</button>
                                <button type="reset" class="btn btn-secondary col-3">Clear</button>
                                <a class="ml-4" href="{{route('index')}}">Back</a>
                            </div>  
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
