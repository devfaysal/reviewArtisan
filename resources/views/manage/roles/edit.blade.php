@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Edit {{$role->display_name}}</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <form class="" action="{{route('roles.update', $role->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <article class="media">
                            <div class="meida-content">
                                <div class="content">
                                    <h2 class="title">Role details: </h2>
                                    <div class="field">
                                        <p class="controll">
                                            <label for="display_name">Name</label>
                                            <input type="text" class="input" id="display_name" name="display_name" value="{{$role->display_name}}">
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="controll">
                                            <label for="name">Slug (Not Editable)</label>
                                            <input type="text" class="input" id="name" name="name" value="{{$role->name}}" disabled>
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="controll">
                                            <label for="description">Description</label>
                                            <input type="text" class="input" id="description" name="description" value="{{$role->description}}">
                                        </p>
                                    </div>
                                    <input type="hidden" name="permissions" :value="permissionsSelected">
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="box">
                        <article class="media">
                            <div class="meida-content">
                                <div class="content">
                                    <h2 class="title">Permissions: </h2>
                                    @foreach ($permissions as $p)
                                        <div class="field">
                                            <b-checkbox v-model="permissionsSelected" native-value="{{$p->id}}">{{$p->display_name}} <em>({{$p->description}})</em></b-checkbox>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    </div>

                    <button class="button is-primary">Save Changes to Role</button>
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
                permissionsSelected: {!!$role->permissions->pluck('id')!!}
            },
        });
    </script>
@endsection
