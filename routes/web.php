<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor')->group(function(){
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
    Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
    Route::resource('/posts', 'PostController');
    Route::resource('/business-pages', 'BusinessPageController', ['except' => 'destroy']);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/business-page/{slug}', 'BusinessPageController@publicView')->name('business-page.public');
Route::middleware('auth')->group(function(){
    Route::get('/business-page/{slug}/writereview', 'ReviewController@create')->name('review.create');
    Route::post('/business-page/{slug}/writereview', 'ReviewController@store')->name('review.store');
});