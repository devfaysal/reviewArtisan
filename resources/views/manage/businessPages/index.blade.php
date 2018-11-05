@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Manage Business Pages</h1>
        <a href="{{route('business-pages.create')}}" class="btn btn-outline-success">Create New Business Page</a>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>Business Name</th>
                    <th>Owner</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bpages as $bpage)
                    <tr>
                        <td>{{$bpage->id}}</td>
                        <td>{{$bpage->business_name}}</td>
                        <td>{{$bpage->owner_id}}</td>
                        <td>{{$bpage->created_at->toFormattedDateString()}}</td>
                        <td><a href="{{route('business-pages.edit', $bpage->id)}}" class="btn btn-sm btn-outline-primary">Edit</a> <a href="{{route('business-pages.show', $bpage->id)}}" class="btn btn-sm btn-outline-info">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!--end of card-->
{{-- {{$bpages->links()}} --}}
@endsection
