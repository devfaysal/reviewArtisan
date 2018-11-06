@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">View Post Details</h1>
        <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-primary">Edit this Post</a>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tr class="d-flex">
                <th class="col-2">id</th>
                <td class="col-10">{{$post->id}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Title</th>
                <td class="col-10">{{$post->title}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Author</th>
                <td class="col-10">{{$post->author->name}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Created At</th>
                <td class="col-10">{{$post->created_at->toFormattedDateString()}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Content</th>
                <td class="col-10">{{$post->content}}</td>
            </tr>
        </table>
    </div>
</div><!--end of card-->
@endsection
