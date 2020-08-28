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
Route::get('/a', 'HomeController@profile');
Route::get('/aa', 'HomeController@profile2');
Route::get('/aaa', 'HomeController@profile3');
Route::get('/li', 'AuthController@login');
Route::get('/z', function (){
    return view('client.page.jobDetail');
});

Route::get('/jobs', 'HomeController@jobs');
Route::get('/jobs/{slug}-{id}.html', 'HomeController@jobDetail')->name('job-detail');;

Route::get('/login', 'AdminController@login')->name('login');
Route::post('/login','AdminController@postLogin')->name('post-login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/forgot', 'AdminController@forgot');

Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');

Route::group(
        ['prefix'=>'admin', 'middleware' => 'CheckManager'], function () {

        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::get('/logout', 'AdminController@logout')->name('admin.logout');
        Route::resource('users', 'UserController')->only(['index', 'show']);
        Route::resource('employees', 'EmployeeController');
        Route::resource('locations', 'LocationController');
        Route::resource('categories', 'CategoryController');
        Route::get('/changeCategoryStatus', 'CategoryController@changeStatus');
        Route::resource('jobs', 'JobController');
        Route::get('jobs/detail/{id}','JobController@detail')->name('job.detail');
        Route::get('/changeJobStatus', 'JobController@updateStatus')->name('job.update.status');
        Route::get('jobs/information', 'JobController@informationJob');
        Route::get('/showinformation', 'ProfileController@showInformation')->name('admin.information');
        Route::get('/updateformation/{id}', 'ProfileController@editInformation')->name('admin.information.edit');
        Route::post('/updateformation/{id}', 'ProfileController@updateInformation')->name('admin.information.update');
        Route::get('change-password', 'ChangePasswordController@index')->name('change.password');
        Route::post('change-password', 'ChangePasswordController@store')->name('changed.password');
        Route::resource('companies', 'CompanyController');
        Route::resource('company_images', 'CompanyImagesController');
        Route::resource('partner_companies', 'PartnerCompaniesController');
        Route::resource('candidates', 'CandidateController')->only(['index', 'show']);
    }
);
