@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Create New Business Page</h1>
            </div>
        </div>
        <hr>
        @if (count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form  action="{{route('business-pages.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column is-three-quarters">
                    <b-field class="m-b-20" label="Business Name">
                        <b-input placeholder="Business Name" size="is-large" v-model="title" value="{{old('business_name')}}" name="business_name"> </b-input>
                    </b-field>

                    <slug-widget url="{{url('/')}}" subdirectory="business-pages" :title="title" @slug-changed="updateSlug"></slug-widget>
                    <input type="hidden" name="slug" :value="slug"/>

                    <div class="columns m-t-10">
                        <div class="column is-one-quarter">
                            <b-field label="Business Category">
                                <b-select placeholder="Select a Category" name="category" expanded>
                                    <option value="flint">Flint</option>
                                    <option value="silver">Silver</option>
                                    <option value="vane">Vane</option>
                                    <option value="billy">Billy</option>
                                    <option value="jack">Jack</option>
                                </b-select>
                            </b-field>
                        </div>
                    </div>

                    <b-field label="Address">
                        <b-input placeholder="Address" name="address" value="{{old('address')}}"> </b-input>
                    </b-field>

                    <div class="columns">
                        <div class="column">
                            <b-field label="Country">
                                <b-input value="Bangladesh" name="country" readonly> </b-input>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Division">
                                <b-select placeholder="Select a Division" name="division" expanded>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </b-select>
                            </b-field>
                        </div>
                        <div class="column">
                        <div>
                        </div>
                            <b-field label="District">
                                <b-select placeholder="Select a District" name="district" expanded>
                                    @foreach ($districts as $district)
                                        <option {{$district->id==old('district')? 'selected' : ''}} value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </b-select>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Thana">
                                <b-select placeholder="Select a Thana" name="thana" expanded>
                                    @foreach ($thanas as $thana)
                                        <option value="{{$thana->id}}">{{$thana->name}}</option>
                                    @endforeach
                                </b-select>
                            </b-field>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <b-field label="City">
                                <b-input placeholder="City" name="city" value="{{old('city')}}"> </b-input>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Postal Code">
                                <b-input placeholder="Postal Code" name="postal_code" value="{{old('postal_code')}}"> </b-input>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Phone">
                                <b-input placeholder="Phone" name="phone" value="{{old('phone')}}"> </b-input>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Email">
                                <b-input type="email" placeholder="Email" name="email" value="{{old('email')}}"> </b-input>
                            </b-field>
                        </div>
                    </div>

                    <b-field class="m-t-10" label="Website">
                        <b-input placeholder="Website" name="website" value="{{old('website')}}"> </b-input>
                    </b-field>


                    <b-field>
                        <b-upload v-model="logo" name="logo">
                            <a class="button is-primary">
                                <b-icon icon="upload"></b-icon>
                                <span>Upload Logo</span>
                            </a>
                        </b-upload>
                        <div v-if="logo && logo.length">
                            <span class="file-name" v-html="logo[0].name"> </span>
                        </div>
                    </b-field>

                    <b-field>
                        <b-upload v-model="banner" name="banner">
                            <a class="button is-primary">
                                <b-icon icon="upload"></b-icon>
                                <span>Upload Banner</span>
                            </a>
                        </b-upload>
                        <div v-if="banner && banner.length">
                            <span class="file-name" v-html="banner[0].name"> </span>
                        </div>
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
                            <p><strong>Status</strong></p>
                            <div class="block">
                                <b-radio v-model="status" name="status" native-value="-1">
                                    Draft
                                </b-radio>
                                <b-radio v-model="status" name="status" native-value="0">
                                    Submit for Review
                                </b-radio>
                            </div>


                            <button class="button is-primary is-fullwidth m-t-10">Submit</button>
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
                unique_search_in: 'business-pages',
                logo: [],
                banner: [],
                status: 'Draft',
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                },
                // getDistricts: function(){
                //     if(this.api_token){
                //         var url = '/api/business-pages/getDistricts';
                //         axios.get(url , {
                //             params: {
                //                 api_token: '{{Auth::user()->api_token}}',
                //                 division: this.division,
                //             }
                //         }).then(function (response){
                //             if(response.data){
                //                 console.log(response.data[0].id);
                //                 this.districts = response.data;
                //                 console.log(this.districts[0].name);
                //             }else {
                //                 console.log(response);
                //             }
                //         }).catch(function(error){
                //             console.log(error);
                //         });
                //     }
                // }
            }
        });
    </script>

@endsection
