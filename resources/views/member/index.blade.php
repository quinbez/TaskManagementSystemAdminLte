@extends('layouts.admin')

@section('content')

<h3>All Members</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            {{-- <th>Role</th> --}}
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
    </thead>
    <tbody>
        @if($members)
            @foreach($members as $member)
                <tr>
                    <td>{{$member->id}}</td>
                    {{-- <td>{{$member->role}}</td> --}}
                    <td>{{$member->name}}</td>
                    <td>{{$member->email}}</td>
                    <td>{{$member->phone_number}}</td>
                    <td>{{$member->created_at?->diffForHumans()}}</td>
                    <td>{{$member->updated_at?->diffForHumans()}}</td>
                    <td><a href="{{url("/member/edit/$member->id") }}" style="color:#efef27;">Edit</a></td>
                    <td><a href="{{url("/member/delete/$member->id")}}" style="color:red;">Delete</a></td>
                </tr>
            @endforeach
        @endif

    </tbody>
@endsection
