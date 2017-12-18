@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit User</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <form action="{{route('users.update', $user->id)}}" method="POST">
            <div class="columns">
              <div class="column">
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
                    <button class="button is-primary">Edit User</button>
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
                password_options: 'keep',
                rolesSelected: {!! $user->roles->pluck('id') !!}
            }
        });
    </script>
@endsection
