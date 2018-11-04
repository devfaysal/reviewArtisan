@extends('layouts.manage')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{$role->display_name}} <small class="m-l-10"><em>({{$role->name}})</em></small></h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
            <a href="{{route('roles.edit', $role->id)}}" class="btn btn-outline-primary">Edit this Role</a>
        </div>
        <div class="card-body">
            <h2 class="title">Permissions: </h2>
            <ul>
                @foreach ($role->permissions as $p)
                    <li>{{$p->display_name}} <em class="m-l-10">({{$p->description}})</em></li>
                @endforeach
            </ul>
        </div>
    </div><!--end of card-->
@endsection
