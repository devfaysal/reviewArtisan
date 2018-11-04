@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">View User Details</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
            <a href="{{route('users.edit', $user->id)}}" class="btn btn-outline-primary">Edit User</a>
        </div>
        <div class="card-body">
            <p><strong>Name: </strong>{{$user->name}}</p>
            <p><strong>Email: </strong>{{$user->email}}</p>
            <p><strong>Roles: </strong></p>
            <ul>
                {{$user->roles->count() == 0 ? 'This user has not been asigned any roles yet' : ''}}
                @foreach( $user->roles as $role)
                    <li>{{$role->display_name}} <em>({{$role->description}})</em></li>
                @endforeach
            </ul>
        </div>
    </div><!--end of card-->
@endsection
