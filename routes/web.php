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


Route::get('/login', 'AdminController@login')->name('login');
Route::post('/login','AdminController@postLogin')->name('post-login');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('/forgot', 'AdminController@forgot');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'AuthController@login')->name('client.login');
Route::post('/login', 'AuthController@postLogin')->name('client.postLogin');
Route::get('/logout', 'AuthController@logout')->name('client.logout');
Route::get('/profile', 'HomeController@profile')->name('client.profile');
Route::get('/changeInfo', 'HomeController@profile2')->name('client.change_info');
Route::post('/changeInfo', 'UserController@update')->name('client.update_info');
Route::get('/changePass', 'HomeController@profile3')->name('client.change_password');
Route::post('/changePass','AuthController@changePassword')->name('client.update_password');

Route::get('/apply', 'HomeController@apply')->name('client.apply');
Route::get('/jobs', 'HomeController@jobs')->name('client.jobs');
Route::get('/jobs/{slug}-{id}.html', 'HomeController@jobDetail')->name('job-detail');
Route::get('/jobs/apply/{slug}-{id}.html', 'HomeController@jobApply')->name('client.applied');
Route::post('/apply','HomeController@userApplyJob')->name('client.apply.job');


Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::group(
        ['prefix'=>'admin'], function () {
        
        Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
        Route::post('login','Auth\AdminLoginController@postLogin')->name('admin.post-login');
        Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::get('/forgot', 'Auth\AdminLoginController@forgot');
        
    Route::group(['middleware' => ['CheckManager']], function () {
        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::get('/', 'AdminController@index')->name('admin.home');
        Route::resource('users', 'UserController')->only(['index', 'show']);
        Route::resource('employees', 'EmployeeController');
        Route::resource('locations', 'LocationController');
        Route::resource('categories', 'CategoryController');
        Route::get('/changeCategoryStatus', 'CategoryController@changeStatus');
        Route::resource('jobs', 'JobController')->except(['show']);
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
    });
    }
);
