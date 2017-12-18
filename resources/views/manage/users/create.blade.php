@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New user</h1>
            </div>
        </div>
        <hr class="m-t-0">

                <form action="{{route('users.store')}}" method="POST">
                    <div class="columns">
                        <div class="column">
                            {{csrf_field()}}
                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input type="text" class="input" name="name" id="name" value="{{old('name')}}">
                                </p>
                            </div>
                            <div class="field">
                                <label for="email" class="label">email</label>
                                <p class="control">
                                    <input type="email" class="input" name="email" id="email" value="{{old('email')}}">
                                </p>
                            </div>
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <p class="control">
                                    <input type="password" class="input" name="password" id="password" v-if="!auto_password">
                                    <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <label for="roles">Roles:</label>
                            <input type="hidden" name="roles" :value="rolesSelected">
                            @foreach($roles as $role)
                                <div class="field">
                                    <b-checkbox v-model="rolesSelected" native-value="{{$role->id}}">{{$role->display_name}} <em>({{$role->description}})</em></b-checkbox>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <button class="button is-primary">Create User</button>
                        </div>
                    </div>
                </form>
    </div>

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
