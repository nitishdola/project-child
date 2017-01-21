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

Route::get('/','AdminAuth\AuthController@showLoginForm');

Route::group(['middleware' => ['web']], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout',['as' => 'admin.logout', 'uses' => 'AdminAuth\AuthController@logout']);

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', ['as' => 'admin.home', 'uses' => 'AdminController@index']);
});  


Route::group(['prefix'=>'student'], function() {
    Route::get('/info/{student_id}', [
        'as' => 'student.info',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@viewInfo'
    ]);
});

Route::group(['prefix'=>'reports'], function() {
    Route::get('/data', [
        'as' => 'reports.data',
        'middleware' => ['admin'],
        'uses' => 'ReportsController@viewReport'
    ]);
});

Route::group(['prefix'=>'api'], function() {
    Route::get('/get-sub-disease', [
        'as' => 'api.sub_disease_list',
        'uses' => 'ApiController@subDiseaseList'
    ]);
});
