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
Route::get('/category/{name}/{page}/{order}', 'PagesController@getCategory');
Route::get('/feature/{itemID}', 'PagesController@getFeature');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'PagesController@getAdmin');
    Route::get('/upload-item', 'PagesController@getUploadItem');
    Route::post('/upload-item', 'PagesController@postUploadItem');
    Route::get('/edit-item/{itemID}', 'PagesController@getEditItem');
    Route::post('/edit-item', 'PagesController@postEditItem');
    Route::get('/set-homepage-item', 'PagesController@getSetHomepageItem');
    Route::post('/set-homepage-item', 'PagesController@postSetHomepageItem');
    Route::get('/manage-categories', 'PagesController@getManageCategories');
    Route::post('/add-category', 'PagesController@postAddCategory');
    Route::get('/edit-category/{catID}', 'PagesController@getEditCategory');
    Route::post('/update-category', 'PagesController@postUpdateCategory');
    Route::post('/delete-category', 'PagesController@postDeleteCategory');
    Route::get('/admin-properties', 'PagesController@getAdminProperties');
    Route::post('/update-artist-name', 'PagesController@postUpdateArtistName');
    Route::post('/update-registration-key', 'PagesController@postUpdateRegistrationKey');
});

