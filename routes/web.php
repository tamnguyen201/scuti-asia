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
        Route::get('/add', ['as'=>'admin.roles.add','uses'=>'RoleController@index']);
        Route::post('add', ['as'=>'admin.roles.store','uses'=>'RoleController@store']);
        Route::get('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'RoleController@edit']);
        Route::post('edit/{id}', ['as'=>'admin.roles.edit','uses'=>'RoleController@update']);
        Route::post('delete/{id}', ['as'=>'admin.roles.delete','uses'=>'RoleController@destroy']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as'=>'admin.users','uses'=>'UserController@index']);
        Route::get('show/{id}', ['as'=>'admin.users.show','uses'=>'UserController@show']);
    });

    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', ['as'=>'admin.employees','uses'=>'EmployeeController@index']);
        Route::get('/add', ['as'=>'admin.employees.add','uses'=>'EmployeeController@create']);
        Route::post('/add', ['as'=>'admin.employees.store','uses'=>'EmployeeController@store']);
        Route::get('/show/{id}', ['as'=>'admin.employees.show','uses'=>'EmployeeController@show']);
        Route::get('/edit/{id}', ['as'=>'admin.employees.edit','uses'=>'EmployeeController@edit']);
        Route::post('/edit/{id}', ['as'=>'admin.employees.update','uses'=>'EmployeeController@update']);
        Route::post('/delete/{id}', ['as'=>'admin.employees.delete','uses'=>'EmployeeController@delete']);
    });
    
});