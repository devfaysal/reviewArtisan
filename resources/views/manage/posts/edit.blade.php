@extends('layouts.manage')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Edit Post</h1>
        </div>
        <div class="card-body">
            <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input v-model="title" id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Title" required>
    
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
                    <input type="hidden" name="slug" :value="slug"/>
                </div>
                <div class="form-group">
                    <b-form-textarea id="content"
                        v-model="content"
                        name="content"
                        placeholder="Content"
                        :rows="3"
                        :max-rows="6">
                    </b-form-textarea>
                </div>
                <div class="form-group">
                    <input id="excerpt" type="text" class="form-control{{ $errors->has('excerpt') ? ' is-invalid' : '' }}" name="excerpt" value="{{ $post->excerpt }}" placeholder="Excerpt" required>
    
                    @if ($errors->has('excerpt'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('excerpt') }}</strong>
                        </span>
                    @endif
                </div>               
                <div class="form-group mb-0 text-center">
                    <button type="submit" class="btn btn-success btn-block">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div><!--end of card-->
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                title: '{{$post->title}}',
                content: '{{ $post->content }}',
                slug: '{{$post->slug}}',
                api_token: '{{Auth::user()->api_token}}'
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            }
        });
    </script>

@endsection
