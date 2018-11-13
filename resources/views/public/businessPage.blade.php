@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img style="width:250px; height:250px;" src="{{asset('storage/logos/'.$bpage->logo)}}" alt="Logo">
                    </div>
                    <div class="col-6">
                        <img style="width:100%; height:250px;" src="{{asset('storage/banners/'.$bpage->banner)}}" alt="Banner">
                    </div>
                </div>
            </div>
        </div><!--end of card-->
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h1 class="title">{{$bpage->business_name}}</h1>
                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$bpage->address}}</span><br/>
                <span><i class="fa fa-phone" aria-hidden="true"> {{$bpage->phone}}</i></span><br/>
                <span><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$bpage->phone}}</i></span><br/>
                <span><i class="fa fa-globe" aria-hidden="true"></i> {{$bpage->website}}</i></span><br/>
            </div>
            <div class="card-footer">
                <a href="{{route('review.create', $bpage->slug)}}">Write Review</a>
            </div>
        </div><!--end of card-->
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                @foreach ($bpage->reviews as $review)
                    <p>{{$review->content}}</p>
                @endforeach
            </div>
        </div><!--end of card-->
    </div>
</div>
@endsection
