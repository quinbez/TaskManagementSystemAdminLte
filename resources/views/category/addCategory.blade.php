@extends('layouts.adminlte')


@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <form action="{{ route('storecategory') }}" method="post" id="createCategoryForm" class="p-4">
            <h3>Add Category</h3>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger p-4">
                        <div class="form-group">
                            <label>Type:</label>
                            <input type="text" name="type" class="form-control" placeholder="Enter type">
                        </div>
                    </div>
                    <div class="form-group py-4">
                        <button type="submit" class="btn btn-primary mr-4 col-3"> + Add</button>
                        <button type="reset" class="btn btn-secondary col-3">Clear</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>
<script src="{{ asset('jquery/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#categNav').addClass('menu-open');
            $('#categNava').addClass('active');
            $('#addcategNav').addClass('active');
        });
    </script>
@endsection
