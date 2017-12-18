@extends('layouts.manage')
@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{$role->display_name}} <small class="m-l-10"><em>({{$role->name}})</em></small></h1>
                <h5>{{$role->description}}</h5>
            </div>
            <div class="column">
                <a href="{{route('roles.edit', $role->id)}}" class="button is-primary is-pulled-right">Edit this Role</a>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <article class="media">
                        <div class="meida-content">
                            <div class="content">
                                <h2 class="title">Permissions: </h2>
                                <ul>
                                    @foreach ($role->permissions as $p)
                                        <li>{{$p->display_name}} <em class="m-l-10">({{$p->description}})</em></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
