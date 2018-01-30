@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">View Post Details</h1>
            </div>
            <div class="column">
                <a href="{{route('posts.edit', $post->id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i>Edit Post</a>
            </div>
        </div>
        <hr class="m-t-0">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="name" class="label">Title</label>
                    <p>{{$post->title}}</p>
                </div>
                <div class="field">
                    <label for="email" class="label">Content</label>
                    <p>{{$post->content}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
