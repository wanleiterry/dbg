<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['prefix' => 'product'], function()
{
    Route::get('list.json', 'ProductController@getList');
    Route::get('{id}.json', 'ProductController@getProduct');
    Route::post('create.json', 'ProductController@postProduct');
    Route::put('{id}.json', 'ProductController@putProduct');
});

Route::group(['prefix' => 'news'], function()
{
    Route::get('list.json', 'NewsController@getNewsList');
    Route::get('{id}.json', 'NewsController@getNews');
    Route::post('create.json', 'NewsController@postNews');
    Route::put('{id}.json', 'NewsController@putNews');
});

