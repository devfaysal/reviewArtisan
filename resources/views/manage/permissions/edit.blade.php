@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Edit this Permission</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        </div>
        <div class="card-body">
            <form class="" action="{{route('permissions.update', $permission->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input id="display_name" type="text" class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}" name="display_name" value="{{$permission->display_name}}" placeholder="Display Name" required>
    
                    @if ($errors->has('display_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$permission->name}}" placeholder="Name" disabled>
    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{$permission->description}}" placeholder="Description" required>
    
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        {{ __('Edit Permission') }}
                    </button>
                </div>
            </form>
        </div>
    </div><!--end of card-->
@endsection
