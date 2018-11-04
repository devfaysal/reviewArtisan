@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">View Permission Details</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
            <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-outline-primary">Edit this Permission</a>
        </div>
        <div class="card-body">
            <p><strong>Name: </strong>{{$permission->name}}</p>
            <p><strong>Display Name: </strong>{{$permission->display_name}}</p>
            <p><strong>Description: </strong>{{$permission->description}}</p>
        </div>
    </div><!--end of card-->
@endsection
