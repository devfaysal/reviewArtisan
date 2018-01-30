@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Post</h1>
            </div>
            <div class="column">
                <a href="{{route('posts.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-t-10"></i> Create New Post</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table is-narrow">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->author->name}}</td>
                                <td>{{$post->created_at->toFormattedDateString()}}</td>
                                <td><a href="{{route('posts.edit', $post->id)}}" class="button is-outlined">Edit</a> <a href="{{route('posts.show', $post->id)}}" class="button is-outlined">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--end of card-->
    </div><!--end of flex-container-->
@endsection
