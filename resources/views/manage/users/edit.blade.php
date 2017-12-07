@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" value="{{$user->name}}">
                        </p>
                    </div>
                    <div class="field">
                        <label for="email" class="label">email</label>
                        <p class="control">
                            <input type="email" class="input" name="email" id="email" value="{{$user->email}}">
                        </p>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <div class="field">
                            <b-radio v-model="password_options" name="password_options" native-value="keep">Do not Change Password</b-radio>
                        </div>
                        <div class="field">
                            <b-radio v-model="password_options" name="password_options" native-value="auto">Auto-Generate new Password</b-radio>
                        </div>
                        <div class="field">
                            <b-radio v-model="password_options" name="password_options" native-value="manual">Manually Set New Password</b-radio>
                            <p class="control">
                                <input type="password" class="input" name="password" id="password" v-if="password_options=='manual'">
                            </p>
                        </div>

                    </div>

                    <button class="button is-primary">Edit User</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                password_options: 'keep',

            }
        });
    </script>
@endsection
