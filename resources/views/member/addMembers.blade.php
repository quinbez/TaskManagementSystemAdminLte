@extends('layouts.adminlte')


@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <form action="{{ route('store') }}" method="post" id="createMemberForm" class="p-4">
                <h3>Add Member</h3>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-danger p-4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Role </label>
                                <select name ='role' class='form-control' required = 'true'>
                                    <option value = ''>Select Role</option>
                                    <option value = 'member'>Member</option>
                                    <option value = 'admin'>Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="phone_number" class="form-control" data-inputmask='"mask": "9999999999"' data-mask>
                                </div>
                            </div>
                            <div class="form-group  py-3">
                                <button type="submit" class="btn btn-primary me-4 col-3"> + Add</button>
                                <button type="reset" class="btn btn-secondary col-3">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#memberNav').addClass('menu-open');
            $('#memberNava').addClass('active');
            $('#addMemberNav').addClass('active');
        });
    </script>
@endsection
