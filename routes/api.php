<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//http://reviewartisan.test/api/business-pages/getDivisions?api_token=b71189ac1f0216b3e105ff5d54dfdfcc29487cd6fe2f7a2fcf802f5e5554
Route::middleware('auth:api')->group(function () {
    Route::get('/posts/unique', 'PostController@apiCheckUnique')->name('api.posts.unique');
    Route::get('/business-pages/unique', 'BusinessPageController@apiCheckUnique')->name('api.business-pages.unique');
    Route::get('/business-pages/getDivisions', 'BusinessPageController@getDivisions')->name('api.business-pages.getDivisions');
    Route::get('/business-pages/getDistricts', 'BusinessPageController@getDistricts')->name('api.business-pages.getDistricts');
});
