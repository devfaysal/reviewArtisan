@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="title has-text-centered">Write a review for <a href="{{route('business-page.public', $bpage->slug)}}">{{$bpage->business_name}}</a></h1>
    </div>
    <div class="card-body">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
        <form action="{{route('review.store', $bpage->slug)}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Your review helps others learn about great local businesses. Please don't review this business if you received a freebie for writing this review, or if you're connected in any way to the owner or employees."></textarea>

                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>               
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-success">
                    {{ __('Post Review') }}
                </button>
                <button class="btn btn-warning">
                    {{ __('Cancel') }}
                </button>
            </div>
        </form>
    </div>
</div><!--end of card-->
@endsection

@section('scripts')
    <script>
        
    </script>

@endsection
