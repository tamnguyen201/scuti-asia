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

Route::group(['prefix'=>'admin'], function(){

    Route::get('/','AdminController@index');

    Route::group(['prefix' => 'users'], function () {
        
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