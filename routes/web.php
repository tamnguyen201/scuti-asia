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

Route::get('/login', 'AdminController@login');
Route::get('/forgot', 'AdminController@forgot');

Route::group(
    ['prefix'=>'admin'], function () {

        Route::get('/', 'AdminController@index');

        Route::resource('roles', 'RoleController')->except(['show']);
        Route::resource('users', 'UserController')->only(['index', 'show']);
        Route::resource('employees', 'EmployeeController');
        
    }
);
