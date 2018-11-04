@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Manage Users</h1>
            <a href="{{route('users.create')}}" class="btn btn-outline-success">Create New User</a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toFormattedDateString()}}</td>
                            <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-outline-primary">Edit</a> <a href="{{route('users.show', $user->id)}}" class="btn btn-sm btn-outline-info">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!--end of card-->
    {{$users->links()}}
@endsection
