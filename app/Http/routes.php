<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'PagesController@getHome');
Route::get('/home', 'PagesController@getHome');
Route::get('/category', 'PagesController@getCategory');
Route::get('/feature', 'PagesController@getFeature');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'PagesController@getAdmin');
    Route::get('/upload-item', 'PagesController@getUploadItem');
    Route::post('/upload-item', 'PagesController@postUploadItem');

});

