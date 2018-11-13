@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($bpages as $bpage)
                <a href="{{route('business-page.public', $bpage->slug)}}">{{$bpage->business_name}}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection
