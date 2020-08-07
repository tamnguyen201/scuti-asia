<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Route::get('/login','AdminController@login');
Route::get('/forgot','AdminController@forgot');

Route::group(['prefix'=>'admin'], function(){

    Route::get('/','AdminController@index');

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', ['as'=>'admin.roles','uses'=>'RoleController@index']);
        // Route::get('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'UserController@edit']);
        // Route::post('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'UserController@update']);
        // Route::post('delete/{id}', ['as'=>'admin.roles.delete','uses'=>'UserController@delete']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as'=>'admin.users','uses'=>'UserController@index']);
        // Route::get('edit/{id}', ['as'=>'admin.users.edit','uses'=>'UserController@edit']);
        // Route::post('edit/{id}', ['as'=>'admin.users.edit','uses'=>'UserController@update']);
        // Route::post('delete/{id}', ['as'=>'admin.users.delete','uses'=>'UserController@delete']);
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
    });

    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', [
            'as' => 'location.index',
            'uses' => 'LocationController@index'
        ]);
    });
    
    Route::group(['prefix' => 'jobs'], function () {
        Route::get('/', [
            'as' => 'job.index',
            'uses' => 'JobController@index'
        ]);
    });
});