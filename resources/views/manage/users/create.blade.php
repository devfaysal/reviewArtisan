@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Create New user</h1>
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required>
    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required>
    
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input v-if="!auto_password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                    <b-form-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-form-checkbox>
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
                auto_password:true,
                rolesSelected: []
            }
        });
    </script>
@endsection
