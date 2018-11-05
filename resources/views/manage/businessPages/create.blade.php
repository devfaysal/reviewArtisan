@extends('layouts.manage')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Create New Business Page</h1>
    </div>
    <div class="card-body">
        <form action="{{route('business-pages.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input v-model="title" id="business_name" type="text" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}" name="business_name" value="{{ old('business_name') }}" placeholder="Business Name" required>

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
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Address" required>

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
                        <option value="{{$division->id}}">{{$division->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="district" id="district">
                    <option value="">--Select District--</option>
                    @foreach($districts as $district)
                        <option value="{{$district->id}}">{{$district->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="thana" id="thana">
                    <option value="">--Select Thana--</option>
                    @foreach($thanas as $thana)
                        <option value="{{$thana->id}}">{{$thana->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <b-form-input v-model="city"
                  type="text"
                  :state="{{ $errors->first('city') ? 'false' : 'null' }}"
                  name="city"
                  value="{{ old('city') }}"
                  placeholder="City">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="postal_code"
                  type="text"
                  :state="{{ $errors->first('postal_code') ? 'false' : 'null' }}"
                  name="postal_code"
                  value="{{ old('postal_code') }}"
                  placeholder="Postal Code">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="phone"
                  type="text"
                  :state="{{ $errors->first('phone') ? 'false' : 'null' }}"
                  name="phone"
                  value="{{ old('phone') }}"
                  placeholder="Phone">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="email"
                  type="text"
                  :state="{{ $errors->first('email') ? 'false' : 'null' }}"
                  name="email"
                  value="{{ old('email') }}"
                  placeholder="Email">
                </b-form-input>
            </div>
            <div class="form-group">
                <b-form-input v-model="website"
                  type="text"
                  :state="{{ $errors->first('website') ? 'false' : 'null' }}"
                  name="website"
                  value="{{ old('website') }}"
                  placeholder="Website">
                </b-form-input>
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
                title: '{{ old('business_name') }}',
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

@endsection
