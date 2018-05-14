@extends('layouts.app')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-content has-text-centered">
                        <img src="/storage/logos/{{$bpage->logo}}" alt="Logo">
                        <h1 class="title">{{$bpage->business_name}}</h1>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{$bpage->address}}</span><br/>
                        <span><i class="fa fa-phone" aria-hidden="true"> {{$bpage->phone}}</i></span><br/>
                        <span><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$bpage->phone}}</i></span><br/>
                        <span><i class="fa fa-globe" aria-hidden="true"></i> {{$bpage->website}}</i></span><br/>
                    </div>
                </div><!--end of card-->
                <a href="{{route('writeReview', $bpage->slug)}}">Write Review</a>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content has-text-centered">
                        <img src="/storage/banners/{{$bpage->banner}}" alt="">
                    </div>
                </div><!--end of card-->
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-content">
                
            </div>
        </div><!--end of card-->
    </div>
@endsection
