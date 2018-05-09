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

Route::middleware('auth:api')->group(function () {
    Route::get('/posts/unique', 'PostController@apiCheckUnique')->name('api.posts.unique');
    Route::get('/business-pages/unique', 'BusinessPageController@apiCheckUnique')->name('api.business-pages.unique');
    Route::get('/business-pages/getDistricts', 'BusinessPageController@getDistricts')->name('api.business-pages.getDistricts');
});
