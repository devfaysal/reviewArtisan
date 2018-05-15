@extends('layouts.app')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title has-text-centered">Write a review for <a href="{{route('business-page.public', $bpage->slug)}}">{{$bpage->business_name}}</a></h1>
            </div>
        </div>
        <hr>
        @if (count($errors) > 0)
        <div class="column is-half is-offset-one-quarter">
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <form  action="{{route('review.store', $bpage->slug)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="column is-full-width">
                        <div class="field">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="column is-full-width">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea is-primary" name="content" rows="10" placeholder="Your review helps others learn about great local businesses. 
Please don't review this business if you received a freebie for writing this review, or if you're connected in any way to the owner or employees."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="column is-full-width">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-primary">Post Review</button>
                            </div>
                            <div class="control">
                                <button class="button is-text">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!--end of flex-container-->
@endsection

@section('scripts')
    <script>
        
    </script>

@endsection
