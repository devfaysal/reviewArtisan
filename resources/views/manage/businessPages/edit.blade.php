@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Update Business Page</h1>
    </div>
    <div class="card-body">
        <form action="{{route('business-pages.update', $businessPage->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input v-model="title" id="business_name" type="text" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}" name="business_name" placeholder="Business Name" required>

                @if ($errors->has('business_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('business_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <slug-widget url="{{url('/')}}" subdirectory="business-pages" :title="title" @slug-changed="updateSlug"></slug-widget>
                <input type="hidden" name="slug" :value="slug"/>
            </div>
            <div class="form-group">
                <select class="form-control" name="category" id="">
                    <option value="1">--Select Category--</option>
                    <option value="2">fd</option>
                    <option value="3">fddd</option>
                </select>
            </div>
            <div class="form-group">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $businessPage->address }}" placeholder="Address" required>

                @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="Bangladesh" placeholder="Country" readonly>

                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <select class="form-control" name="division" id="division">
                    <option value="">--Select Division--</option>
                    @foreach($divisions as $division)
                        <option value="{{$division->id}}" {{$businessPage->division == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="district" id="district">
                    <option value="">--Select District--</option>
                    @foreach($districts as $district)
                        <option value="{{$district->id}}" {{$businessPage->district == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="thana" id="thana">
                    <option value="">--Select Thana--</option>
                    @foreach($thanas as $thana)
                        <option value="{{$thana->id}}" {{$businessPage->thana == $thana->id ? 'selected' : ''}}>{{$thana->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <b-form-input v-model="city"
                  type="text"
                  :state="{{ $errors->first('city') ? 'false' : 'null' }}"
                  name="city"
                  value="{{ $businessPage->city }}"
                  placeholder="City">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="postal_code"
                  type="text"
                  :state="{{ $errors->first('postal_code') ? 'false' : 'null' }}"
                  name="postal_code"
                  value="{{ $businessPage->postal_code }}"
                  placeholder="Postal Code">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="phone"
                  type="text"
                  :state="{{ $errors->first('phone') ? 'false' : 'null' }}"
                  name="phone"
                  value="{{ $businessPage->phone }}"
                  placeholder="Phone">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="email"
                  type="text"
                  :state="{{ $errors->first('email') ? 'false' : 'null' }}"
                  name="email"
                  value="{{ $businessPage->email }}"
                  placeholder="Email">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="website"
                  type="text"
                  :state="{{ $errors->first('website') ? 'false' : 'null' }}"
                  name="website"
                  value="{{ $businessPage->website }}"
                  placeholder="Website">
                </b-form-input>
            </div>
            <div class="form-group">
                <label for="logo">{{ __('Logo') }}</label>
                <input onchange="previewFile('#logo_preview', '#logo')" id="logo" type="file" class="form-control-file{{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo">
                <p class="text-danger">Supported file format JPG, PNG. Maximum file size: 1MB</p>
                <img id="logo_preview" style="width: 100px;" src="{{asset('storage/logos/'.$businessPage->logo)}}" class="img-thumbnail" height="">

                @if ($errors->has('logo'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('logo') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="banner">{{ __('Banner') }}</label>
                <input onchange="previewFile('#banner_preview','#banner')" id="banner" type="file" class="form-control-file{{ $errors->has('banner') ? ' is-invalid' : '' }}" name="banner">
                <p class="text-danger">Supported file format JPG, PNG. Maximum file size: 1MB</p>
                <img id="banner_preview" style="width: 100px;" src="{{asset('storage/banners/'.$businessPage->banner)}}" class="img-thumbnail" height="">

                @if ($errors->has('banner'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('banner') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group mb-0 text-center">
                <button type="submit" class="btn btn-success btn-block">
                    {{ __('Submit') }}
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
                title: '{{ $businessPage->business_name }}',
                slug: '',
                api_token: '{{Auth::user()->api_token}}',
                unique_search_in: 'business-pages',
                logo: [],
                banner: [],
                status: 'Draft',
                category: 'Select',
                //district: ''
            },
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                },
            },
            computed: {
                // districtState: function(){
                //     if(this.district.length > 2){
                //         return true
                //     }else{
                //         return {{$errors->first('district') ? 'false' : 'null'}}
                //     }
                // }
            }
        });
    </script>
    <script>
        function previewFile(preview, source) {
            var preview = document.querySelector(preview);
            var file    = document.querySelector(source).files[0];
            var reader  = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
            console.log(preview.src);
        }
    </script>

@endsection
