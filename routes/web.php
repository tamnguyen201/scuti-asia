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

Route::get('/login', 'AdminController@login')->name('login');
Route::post('/login','AdminController@postLogin')->name('post-login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/forgot', 'AdminController@forgot');

Route::group(
    ['prefix'=>'admin'], function () {

        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::get('/logout', 'AdminController@logout')->name('admin.logout');
        Route::resource('roles', 'RoleController')->except(['show']);
        Route::resource('users', 'UserController')->only(['index', 'show']);
        Route::resource('employees', 'EmployeeController');
        Route::resource('locations', 'LocationController')->names(
            [
            'index' => 'location.index',
            'store' => 'location.store',
            'edit' => 'location.edit',
            'update' => 'location.update',
            'destroy' => 'location.destroy',
            ]
        );
    }
);
