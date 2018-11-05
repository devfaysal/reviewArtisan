@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">View Business Page Details</h1>
        <a href="{{url()->previous()}}" class="btn btn-outline-dark">Back</a>
        <a href="{{route('business-pages.edit', $businessPage->id)}}" class="btn btn-outline-success">Edit this Business Page</a>
    </div>
    <div class="card-body">
        <table class="table table-sm">
            <tr class="d-flex">
                <th class="col-2">id</th>
                <td class="col-10">{{$businessPage->id}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Business Name</th>
                <td class="col-10">{{$businessPage->business_name}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Slug</th>
                <td class="col-10"><a target="_blank" href="{{route('business-page.public', $businessPage->slug)}}">{{$businessPage->slug}}</a></td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Category</th>
                <td class="col-10">{{$businessPage->category}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Address</th>
                <td class="col-10">{{$businessPage->address}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Country</th>
                <td class="col-10">{{$businessPage->country}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Division</th>
                <td class="col-10">{{$businessPage->division}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">District</th>
                <td class="col-10">{{$businessPage->district}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Thana</th>
                <td class="col-10">{{$businessPage->thana}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">City</th>
                <td class="col-10">{{$businessPage->city}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Postal Code</th>
                <td class="col-10">{{$businessPage->postal_code}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Phone</th>
                <td class="col-10">{{$businessPage->phone}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Email</th>
                <td class="col-10">{{$businessPage->email}}</td>
            </tr>
            <tr class="d-flex">
                <th class="col-2">Website</th>
                <td class="col-10">{{$businessPage->website}}</td>
            </tr>
        </table>
    </div>
</div><!--end of card-->
@endsection