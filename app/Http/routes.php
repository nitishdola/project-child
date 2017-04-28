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

    Route::get('/print-view/{student_id}', [
        'as' => 'student.print',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@printView'
    ]);

    Route::get('/create', [
        'as' => 'student.create',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@create'
    ]);
    Route::post('/save', [
        'as' => 'student.store',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@saveStudent'
    ]);

    Route::get('/list-all', [
        'as' => 'student.index',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@listAll'
    ]);

    Route::get('/edit/{num}', [
        'as' => 'student.edit',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@editStudent'
    ]);

    Route::post('/update/{num}', [
        'as' => 'student.update',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@updateStudent'
    ]);

    Route::get('/delete/{num}', [
        'as' => 'student.disable',
        'middleware' => ['admin'],
        'uses' => 'StudentsController@disableStudent'
    ]);
});


Route::group(['prefix'=>'checkup'], function() {
    Route::get('/add', [
        'as' => 'checkup.add',
        'middleware' => ['admin'],
        'uses' => 'CheckupsController@addCheckup'
    ]);

    Route::post('/add', [
        'as' => 'checkup.post',
        'middleware' => ['admin'],
        'uses' => 'CheckupsController@postCheckup'
    ]);

    Route::get('/edit/{check_id}', [
        'as' => 'checkup.edit',
        'middleware' => ['admin'],
        'uses' => 'CheckupsController@editCheckup'
    ]);

    Route::get('/update/{check_id}', [
        'as' => 'checkup.update',
        'middleware' => ['admin'],
        'uses' => 'CheckupsController@updateCheckup'
    ]);
});

Route::group(['prefix'=>'reports'], function() {
    Route::get('/data', [
        'as' => 'reports.data',
        'middleware' => ['admin'],
        'uses' => 'ReportsController@viewReport'
    ]);
});


Route::group(['prefix'=>'school'], function() {
    Route::get('/create', [
        'as' => 'school.create',
        'middleware' => ['admin'],
        'uses' => 'SchoolsController@create'
    ]);
    Route::post('/store', [
        'as' => 'school.store',
        'middleware' => ['admin'],
        'uses' => 'SchoolsController@store'
    ]);
});

Route::group(['prefix'=>'api'], function() {
    Route::get('/get-sub-disease', [
        'as' => 'api.sub_disease_list',
        'uses' => 'ApiController@subDiseaseList'
    ]);

    Route::get('/get-students', [
        'as' => 'api.student_list',
        'uses' => 'ApiController@studentList'
    ]);

    Route::get('/get-class-subs', [
        'as' => 'api.get_class_subs',
        'uses' => 'ApiController@getClassSubs'
    ]);
});
