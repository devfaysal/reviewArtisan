@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Manage Post</h1>
            </div>
            <div class="column">
                <a href="{{route('business-pages.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-add m-t-10"></i> Create Business Page</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                <table class="table is-narrow">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Business Name</th>
                            <th>Owner</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div><!--end of card-->
    </div><!--end of flex-container-->
@endsection
