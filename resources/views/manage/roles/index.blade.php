@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Manage Role</h1>
            <a href="{{route('roles.create')}}" class="btn btn-outline-success">Create New Role</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($roles as $role)
                    <div class="col-3 m-b-30">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$role->display_name}}</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="subtitle"><em>{{$role->name}}</em></h4>
                                <p>{{$role->description}}</p>
                                <div class="row">
                                    <div class="col-6">
                                    <a href="{{route('roles.show', $role->id)}}" class="btn btn-outline-primary btn-block">Details</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-info btn-block">Edit</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><!--end of card-->
@endsection
