@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Permission</h1>
            </div>
            <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-t-10"></i> Create New Permission</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table is-narrow">
                    <thead>
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
                                <td><a href="{{route('permissions.edit', $permission->id)}}" class="button is-outlined">Edit</a> <a href="{{route('permissions.show', $permission->id)}}" class="button is-outlined">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--end of card-->
    </div>
@endsection
