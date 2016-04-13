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

// Route::get('/', function () {
//     return view('welcome');
// });

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

// Route::group(['middleware' => ['web']], function () {
//     //
// });

Route::group(['prefix' => 'auth'], function () {
	$Auth = 'Auth\AuthController@';
	//登录接口
	Route::post('login.json', $Auth . 'postLogin');
	//登出
	Route::get('logout.json', $Auth . 'getLogout');
	//登录
	Route::get('login', $Auth . 'getLogin');
});

//管理员
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    //管理员信息
	Route::get('user.json', 'UserController@showUser');
	Route::put('user.json', 'UserController@updateUser');
	Route::put('passwd.json', 'UserController@updatePasswd');

    //产品
    Route::post('product/create.json', 'ProductController@postProduct');
//     Route::put('product/{id}.json', 'ProductController@putProduct');
    Route::post('product/{id}.json', 'ProductController@updateProduct');
    Route::delete('product/{id}.json', 'ProductController@delProduct');

    //新闻
    Route::post('news/create.json', 'NewsController@postNews');
    Route::post('news/{id}.json', 'NewsController@putNews');
    Route::delete('news/{id}.json', 'NewsController@delNews');

    //公司信息
    Route::put('company.json', 'CompanyController@putCompany');

    //分类
    Route::post('cate/create.json', 'CategoryController@postCategory');
    Route::put('cate/{id}.json', 'CategoryController@putCategory');
    Route::delete('cate/{id}.json', 'CategoryController@delCategory');

    //案例
    Route::post('case/create.json', 'AnliController@postAnli');
    Route::post('case/{id}.json', 'AnliController@updateAnli');
    Route::delete('case/{id}.json', 'AnliController@delAnli');
});

//产品
Route::group(['prefix' => 'product'], function()
{
    Route::get('list.json', 'ProductController@getProductList');
    Route::get('{id}.json', 'ProductController@getProduct');
});

//新闻
Route::group(['prefix' => 'news'], function()
{
    Route::get('list.json', 'NewsController@getNewsList');
    Route::get('{id}.json', 'NewsController@getNews');
});

//留言
Route::group(['prefix' => 'feedback'], function()
{
	Route::get('list.json', 'FeedbackController@getFeedbackList');
	Route::get('{id}.json', 'FeedbackController@getFeedback');
	Route::post('create.json', 'FeedbackController@postFeedback');
//	Route::put('{id}.json', 'FeedbackController@putFeedback');
});

//公司
Route::get('company.json', 'CompanyController@getCompany');

//分类
Route::group(['prefix' => 'cate'], function()
{
    Route::get('list.json', 'CategoryController@getCategoryList');
    Route::get('{id}.json', 'CategoryController@getCategory');
});

//案例
Route::group(['prefix' => 'case'], function()
{
    Route::get('list.json', 'AnliController@getAnliList');
    Route::get('{id}.json', 'AnliController@getAnli');
});

Route::get('/', 'WelcomeController@index');
//Route::group(['middleware' => 'web'], function () {
//    Route::auth();
//
//    Route::get('/home', 'HomeController@index');
//});
