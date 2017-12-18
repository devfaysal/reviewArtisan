@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New Role</h1>
            </div>
        </div>
        <hr class="m-t-0">

        <form class="" action="{{route('roles.store')}}" method="POST">
            {{csrf_field()}}
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
                                            <input type="text" class="input" id="display_name" name="display_name" value="{{old('display_name')}}">
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="controll">
                                            <label for="name">Slug (Not Editable in Future)</label>
                                            <input type="text" class="input" id="name" name="name" value="{{old('name')}}">
                                        </p>
                                    </div>
                                    <div class="field">
                                        <p class="controll">
                                            <label for="description">Description</label>
                                            <input type="text" class="input" id="description" name="description" value="{{old('description')}}">
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

                    <button class="button is-primary">Create new Role</button>
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
                permissionsSelected: []
            },
        });
    </script>
@endsection
