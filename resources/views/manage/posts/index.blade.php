@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Manage Post</h1>
        <a href="{{route('posts.create')}}" class="btn btn-outline-success">Create New Post</a>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <thead class="thead-light">
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
                        <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-outline-primary">Edit</a> <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-outline-info">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--end of card-->
@endsection
