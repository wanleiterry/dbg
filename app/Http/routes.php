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

Route::group(['prefix' => 'admin'], function()
{
    //管理员信息
	Route::get('user.json', 'UserController@showUser');
	Route::put('user.json', 'UserController@updateUser');
	Route::put('passwd.json', 'UserController@updatePasswd');

    //产品
    Route::post('product/create.json', 'ProductController@postProduct');
    Route::put('product/{id}.json', 'ProductController@putProduct');

    //新闻
    Route::post('news/create.json', 'NewsController@postNews');
    Route::put('news/{id}.json', 'NewsController@putNews');

    //公司信息
    Route::put('company.json', 'CompanyController@putCompany');

    //分类
    Route::post('cate/create.json', 'CategoryController@postCategory');
    Route::put('cate/{id}.json', 'CategoryController@putCategory');

    //案例
    Route::post('case/create.json', 'AnliController@postAnli');
    Route::put('case/{id}.json', 'AnliController@putAnli');
});

Route::group(['prefix' => 'product'], function()
{
    Route::get('list.json', 'ProductController@getProductList');
    Route::get('{id}.json', 'ProductController@getProduct');
});

Route::group(['prefix' => 'news'], function()
{
    Route::get('list.json', 'NewsController@getNewsList');
    Route::get('{id}.json', 'NewsController@getNews');
});

Route::group(['prefix' => 'feedback'], function()
{
	Route::get('list.json', 'FeedbackController@getFeedbackList');
	Route::get('{id}.json', 'FeedbackController@getFeedback');
	Route::post('create.json', 'FeedbackController@postFeedback');
//	Route::put('{id}.json', 'FeedbackController@putFeedback');
});

Route::get('company.json', 'CompanyController@getCompany');

Route::group(['prefix' => 'cate'], function()
{
    Route::get('list.json', 'CategoryController@getCategoryList');
    Route::get('{id}.json', 'CategoryController@getCategory');
});

Route::group(['prefix' => 'case'], function()
{
    Route::get('list.json', 'AnliController@getAnliList');
    Route::get('{id}.json', 'AnliController@getAnli');
});

