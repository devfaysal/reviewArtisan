@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Edit User</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        </div>
        <div class="card-body">
            <form action="{{route('users.update', $user->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" placeholder="Name" required>
    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" placeholder="E-mail Address" required>
    
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <b-form-group label="Password">
                    <b-form-radio-group id="password_options" v-model="password_options" name="password_options">
                        <b-form-radio value="keep">Do not Change Password</b-form-radio>
                        <b-form-radio value="auto">Auto-Generate new Password</b-form-radio>
                        <b-form-radio value="manual">Manually Set New Password</b-form-radio>
                    </b-form-radio-group>
                </b-form-group>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" v-if="password_options=='manual'" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="roles" :value="rolesSelected">
                <b-form-group label="Roles">
                    <b-form-checkbox-group v-model="rolesSelected">
                        @foreach($roles as $role)
                            <b-form-checkbox value="{{$role->id}}">{{$role->display_name}}</b-form-checkbox>
                        @endforeach
                    </b-form-checkbox-group>
                </b-form-group>
                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        {{ __('Create User') }}
                    </button>
                </div>
            </form>
        </div>
    </div><!--end of card-->
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!}
            }
        });
    </script>
@endsection
