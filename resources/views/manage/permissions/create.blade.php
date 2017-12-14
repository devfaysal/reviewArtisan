@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Create New Permission</h1>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <form action="{{route('permissions.store')}}" method="POST">
                    {{csrf_field()}}

                    <div class="block">
                        <b-radio v-model="permissionType" native-value="basic" name="permission_type">Basic Permission</b-radio>
                        <b-radio v-model="permissionType" native-value="crud" name="permission_type">CRUD Permission</b-radio>
                    </div>

                    <div v-if="permissionType == 'basic'">
                        <div class="field">
                            <label for="display_name" class="label">Name (Display Name)</label>
                            <p class="control">
                                <input type="text" class="input" name="display_name" id="display_name" value="{{old('display_name')}}">
                            </p>
                        </div>
                        <div class="field">
                            <label for="name" class="label">Name</label>
                            <p class="control">
                                <input type="text" class="input" name="name" id="name" value="{{old('name')}}">
                            </p>
                        </div>
                        <div class="field">
                            <label for="description" class="label">Description</label>
                            <p class="control">
                                <input type="text" class="input" name="description" id="description" value="{{old('description')}}">
                            </p>
                        </div>
                    </div>
                    <div v-if="permissionType == 'crud'">
                        <div class="field">
                            <label for="resource" class="label">Resource Name</label>
                            <p class="control">
                                <input type="text" class="input" name="resource" id="resource" v-model="resource" value="{{old('resource')}}">
                            </p>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="create">Create</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="read">Read</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="update">Update</b-checkbox>
                                </div>
                                <div class="field">
                                    <b-checkbox v-model="crudSelected" native-value="delete">Delete</b-checkbox>
                                </div>
                            </div><!--end of column-->
                            <input type="hidden" name="crud_selected" :value="crudSelected">

                            <div class="column">
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
                            </div>
                        </div><!--end of columns-->
                    </div>
                    <button class="button is-success m-t-10">Create Permission</button>
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
