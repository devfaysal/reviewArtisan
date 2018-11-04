@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Create New Permission</h1>
            <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        </div>
        <div class="card-body">
            <form class="" action="{{route('permissions.store')}}" method="POST">
                @csrf
                <b-form-group label="Permission Type">
                    <b-form-radio-group id="permission_type" v-model="permissionType" name="permission_type">
                        <b-form-radio value="basic">Basic Permission</b-form-radio>
                        <b-form-radio value="crud">CRUD Permission</b-form-radio>
                    </b-form-radio-group>
                </b-form-group>
                <div v-if="permissionType == 'basic'">
                    <div class="form-group">
                        <input id="display_name" type="text" class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}" name="display_name" value="{{ old('display_name') }}" placeholder="Display Name" required>
        
                        @if ($errors->has('display_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Name" required>
        
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" placeholder="Description" required>
        
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div><!--end of permissionType == 'basic'-->
                <div v-if="permissionType == 'crud'">
                    <div class="form-group">
                        <input v-model="resource" id="resource" type="text" class="form-control{{ $errors->has('resource') ? ' is-invalid' : '' }}" name="resource" value="{{ old('resource') }}" placeholder="Resource Name" required>
        
                        @if ($errors->has('display_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('resource') }}</strong>
                            </span>
                        @endif
                    </div>
                    <b-form-group label="Actions">
                        <b-form-checkbox-group v-model="crudSelected">
                            <b-form-checkbox value="create">Create</b-form-checkbox>
                            <b-form-checkbox value="read">Read</b-form-checkbox>
                            <b-form-checkbox value="update">Update</b-form-checkbox>
                            <b-form-checkbox value="delete">Delete</b-form-checkbox>
                        </b-form-checkbox-group>
                    </b-form-group>
                    <input type="hidden" name="crud_selected" :value="crudSelected">
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                        </thead>
                        <tbody v-if="resource.length > 3">
                            <tr v-for="item in crudSelected">
                                <td v-text="crudName(item)"></td>
                                <td v-text="crudSlug(item)"></td>
                                <td v-text="crudDescription(item)"></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--end of permissionType == 'crud'-->
                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        {{ __('Create new Role') }}
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
                permissionType:'basic',
                resource: '',
                crudSelected: ['create', 'read', 'update', 'delete']
            },
            methods: {
                crudName: function(item){
                    return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function(item){
                    return item.toLowerCase() + "_" + app.resource.toLowerCase();
                },
                crudDescription: function(item){
                    return "Allow users to " + item.toUpperCase() + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
                }
            }
        });
    </script>
@endsection
