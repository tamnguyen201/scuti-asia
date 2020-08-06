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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','AdminController@login');
Route::get('/forgot','AdminController@forgot');

Route::group(['prefix'=>'admin'], function(){

    Route::get('/','AdminController@index');

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', ['as'=>'admin.roles','uses'=>'RoleController@index']);
        Route::get('list', ['as'=>'admin.roles.list','uses'=>'UserController@index']);
        Route::get('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'UserController@edit']);
        Route::post('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'UserController@update']);
        Route::post('delete/{id}', ['as'=>'admin.roles.delete','uses'=>'UserController@delete']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as'=>'admin.users','uses'=>'UserController@index']);
        Route::get('list', ['as'=>'admin.users.list','uses'=>'UserController@index']);
        Route::get('edit/{id}', ['as'=>'admin.users.edit','uses'=>'UserController@edit']);
        Route::post('edit/{id}', ['as'=>'admin.users.edit','uses'=>'UserController@update']);
        Route::post('delete/{id}', ['as'=>'admin.users.delete','uses'=>'UserController@delete']);
    });
    
});