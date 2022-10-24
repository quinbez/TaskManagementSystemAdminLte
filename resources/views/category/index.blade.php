@extends('layouts.admin')

@section('content')

<h3>All Category</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Update</th>
            <th>Remove</th>

        </tr>
    </thead>
    <tbody>
    @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->type}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>
                    <td><a href="{{url("/category/edit/$category->id")}}" style= "color:#efef27;">Edit</a></td>
                    <td><a href="{{url("/category/delete/$category->id")}}" style="color:red;">Delete</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
@endsection
