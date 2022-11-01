@extends('layouts.adminlte')


@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <form action="{{ route('updatecateg') }}" method="post" id="createCategoryForm" class="p-4">
            <h3>Edit Category</h3>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-danger p-4">
                        <div class="form-group">
                            <label>Type:</label>
                            <input type="hidden" value="{{$categories->id}}" name="categoryId">
                            <input type="text" value="{{$categories->type}}" name="type" class="form-control" placeholder="Enter type">
                        </div>
                    </div>
                    <div class="form-group py-3">
                        <button type="submit" class="btn btn-primary  mr-4 col-3">Edit</button>
                        <button type="reset" class="btn btn-secondary col-3">Clear</button>
                        <a class="ml-4" href="{{route('indexcategory')}}">Back</a>
                    </div>  

                </div>
            </div>

        </form>
    </div>
</div>

@endsection
