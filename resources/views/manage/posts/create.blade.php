@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create New Post</h1>
            </div>
        </div>
        <hr>

        <form  action="{{route('posts.store')}}" method="post">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column is-three-quarters">
                    <b-field class="m-b-20">
                        <b-input placeholder="Post Title" size="is-large" v-model="title" name="title"> </b-input>
                    </b-field>

                    <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug"></slug-widget>
                    <input type="hidden" name="slug" :value="slug"/>

                    <b-field class="m-t-30">
                        <b-input placeholder="Content" maxlength="200" type="textarea" rows="12" name="content"></b-input>
                    </b-field>
                    <b-field class="m-t-30">
                        <b-input placeholder="Excerpt" maxlength="200" type="textarea" rows="3" name="excerpt"></b-input>
                    </b-field>
                </div>
                <div class="column is-one-quarter">
                    <div class="card card-widget">
                        <div class="author-widget-area">
                            <img src="https://placehold.it/50x50" alt="">
                            <h4>Faysal Ahamed</h4>
                        </div>
                        <div class="post-status-widget-area">
                            <div class="status-icon">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="status-content">
                                <h4>Draft Saved</h4>
                                <small>A few Minutes ago</small>
                            </div>
                        </div>
                        <div class="publish-button-widget-area">
                                <button class="button is-outlined is-fullwidth">Save Draft</button>
                                <button class="button is-primary is-fullwidth m-t-10">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!--end of flex-container-->
@endsection

@section('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                title: '',
                slug: '',
                api_token: '{{Auth::user()->api_token}}',
                unique_search_in: 'posts',
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            }
        });
    </script>

@endsection
