@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Manage Permission</h1>
            <a href="{{route('permissions.create')}}" class="btn btn-outline-success">Create New Permission</a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{$permission->display_name}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                        <td><a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-outline-primary">Edit</a> <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-sm btn-outline-info">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!--end of card-->
@endsection
