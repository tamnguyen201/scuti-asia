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

Route::get('/', 'HomeController@index')->name('home');



Route::group(
        ['prefix'=>'admin'], function () {
        
        Route::get('login', 'Auth\AdminLoginController@login')->name('admin.login');
        Route::post('login','Auth\AdminLoginController@postLogin')->name('admin.post-login');
        Route::get('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::get('/forgot', 'Auth\AdminLoginController@forgot');
        Route::post('/forgot','ResetPasswordController@getForgotPassword')->name('admin.forgot_password');
        Route::get('/confirmOTP/{email}', 'ResetPasswordController@confirmOTP')->name('admin.forgot_password.confirmOTP');
        Route::post('/confirmOTP/{email}','ResetPasswordController@postConfirmOTP')->name('post.confirmOTP');
        Route::get('forgot/change-password/{email}', 'ResetPasswordController@formNewPW')->name('admin.forgot_password.show_form_changePW');
        Route::post('forgot/change-password/{email}', 'ResetPasswordController@storeNewPW')->name('admin.forgot_password.newPW');

    Route::group(['middleware' => ['CheckManager']], function () {

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
        Route::group(['prefix' => 'evaluate'], function () {
            Route::post('/checking/{id}',  'EvaluateController@checking')->name('evaluate.checking');
            Route::get('/send-email/{id}',  'EvaluateController@sendEmail')->name('evaluate.send-email');
        });

        Route::get('fullcalendar/{id}','EvaluateController@showCalendar')->name('evaluate.interview');
        Route::post('fullcalendar/create','EvaluateController@storeCalendar')->name('store.event');
        Route::post('fullcalendar/update','EvaluateController@updateCalendar');
        Route::post('fullcalendar/delete','EvaluateController@destroyCalendar');

        });
    }
);
