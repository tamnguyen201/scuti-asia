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

        Route::resource('roles', 'RoleController')->names(
            [
            'index' => 'admin.roles',
            'store' => 'admin.roles.store',
            'edit' => 'admin.roles.edit',
            'update' => 'admin.roles.update',
            'destroy' => 'admin.roles.destroy',
            ]
        );

        Route::resource('users', 'UserController')
            ->only(['index', 'show'])
            ->names(
                [
                'index' => 'admin.users',
                'show' => 'admin.users.show',
                ]
            );

        Route::resource('employees', 'EmployeeController')->names(
            [
            'index' => 'admin.employees',
            'create' => 'admin.employees.create',
            'store' => 'admin.employees.store',
            'show' => 'admin.employees.show',
            'edit' => 'admin.employees.edit',
            'update' => 'admin.employees.update',
            'destroy' => 'admin.employees.destroy',
            ]
        );
    }
);
