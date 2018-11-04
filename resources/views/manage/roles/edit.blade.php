@extends('layouts.manage')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Create New Role</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        </div>
        <div class="card-body">
            <form class="" action="{{route('roles.update', $role->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="display_name">Display Name</label>
                    <input id="display_name" type="text" class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}" name="display_name" value="{{$role->display_name}}" placeholder="Display Name" required>
    
                    @if ($errors->has('display_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Slug (Not Editable)</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$role->name}}" placeholder="Name" disabled>
    
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{$role->description}}" placeholder="Description" required>
    
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <h2>Permissions: </h2>
                <input type="hidden" name="permissions" :value="permissionsSelected">
                <b-form-group>
                    <b-form-checkbox-group v-model="permissionsSelected">
                        @foreach($permissions as $permission)
                            <b-form-checkbox value="{{$permission->id}}">{{$permission->display_name}}</b-form-checkbox>
                        @endforeach
                    </b-form-checkbox-group>
                </b-form-group>
                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        {{ __('Save Changes to Role') }}
                    </button>
                </div>
            </form>
        </div>
    </div><!--end of card-->


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
