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
Route::get('/login', 'AuthController@login')->name('client.login');
Route::post('/login', 'AuthController@postLogin')->name('client.postLogin');
Route::get('/register', 'AuthController@register')->name('client.register');
Route::post('/register', 'AuthController@postRegister')->name('client.postRegister');

Route::get('/forgot-password', 'AuthController@forgotPassword')->name('client.forgot_password');
Route::post('/forgot-password','AuthController@getForgotPassword')->name('client.confirm_forgot_password');
Route::get('reset-password/{token}', 'AuthController@formResetPW')->name('client.reset_password');
Route::post('reset-password/{token}', 'AuthController@storeResetPW')->name('client.reset_new_password');

Route::get('/logout', 'AuthController@logout')->name('client.logout');
Route::get('/profile/{tab?}', 'HomeController@profile')->name('client.profile');
Route::post('/change-infomation', 'UserController@update')->name('client.update_info');
Route::get('/upload-cv', 'CVController@create')->name('client.create_cv');
Route::post('/upload-cv', 'CVController@store')->name('client.upload_cv');
Route::get('/edit-cv/{id}', 'CVController@edit')->name('client.edit_cv');
Route::post('/update-cv/{id}', 'CVController@update')->name('client.update_cv');
Route::delete('/delete-cv/{id}', 'CVController@destroy')->name('client.destroy_cv');
Route::get('/change-password', 'HomeController@changePassword')->name('client.change_password');
Route::post('/change-password','AuthController@changePassword')->name('client.update_password');
Route::post('/visit-us','HomeController@visit_us')->name('client.visit_us');
Route::get('/apply', 'HomeController@apply')->name('client.apply');
Route::post('/job-search', 'HomeController@jobSearch')->name('client.jobSearch');
Route::get('/filter-jobs', 'HomeController@filterJob')->name('client.filter_jobs');
Route::get('/jobs-{id}/{slug}.html', 'HomeController@jobDetail')->name('job-detail');
Route::get('/jobs-{id}/apply/{slug}.html', 'HomeController@jobApply')->name('client.applied');
Route::post('/apply','HomeController@userApplyJob')->name('client.apply.job');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');



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
        Route::post('dashboard/search', 'AdminController@search')->name('admin.dashboard.search');
        Route::post('users/search', 'UserController@search')->name('user.search');
        Route::resource('users', 'UserController')->only(['index', 'show']);
        Route::get('/change-admin-account-status', 'EmployeeController@updateStatus')->name('admin.update.status');
        Route::resource('employees', 'EmployeeController');
        Route::resource('locations', 'LocationController');
        Route::resource('categories', 'CategoryController');
        Route::get('/changeCategoryStatus', 'CategoryController@changeStatus');
        Route::post('jobs/search', 'JobController@search')->name('admin.job.search');
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
        Route::resource('new_spaper', 'NewSpaperController');
        Route::get('candidates/evaluating', 'CandidateController@evaluating')->name('candidates.evaluating');
        Route::get('candidates/finish', 'CandidateController@finish')->name('candidates.finish');
        Route::get('candidates/failed', 'CandidateController@failed')->name('candidates.failed');
        Route::post('candidates/search', 'CandidateController@search')->name('candidates.search');
        Route::resource('candidates', 'CandidateController')->only(['index', 'show', 'create', 'store']);
        Route::get('candidates/job/{id}','CandidateController@showByJob')->name('candidate.byJob');
        Route::group(['prefix' => 'evaluate'], function () {
            Route::get('candidate/{id}', 'EvaluateController@show')->name('evaluate.candidate.show');
            Route::post('candidate/{id}', 'EvaluateController@store')->name('evaluate.store');
            Route::get('process/calendar/create/{id}','EvaluateController@createCalendar')->name('create.event');
            Route::post('process/calendar/store','EvaluateController@storeCalendar')->name('store.event');
            Route::get('process/calendar/edit/{id}','EvaluateController@editCalendar')->name('edit.event');
            Route::post('process/calendar/update/{id}','EvaluateController@updateCalendar')->name('update.event');
            Route::post('start-evaluate/{id}','EvaluateController@startEvaluate')->name('start.evaluate');
            Route::post('process/send-email','EvaluateController@createEmail')->name('send.event.email');
            Route::post('fullcalendar/delete/{id}','EvaluateController@destroyCalendar')->name('event.delete');
        });
        
        Route::get('fullcalendar','FullcalendarController@show')->name('fullcalendar.show');

        Route::resource('new-spaper', 'NewSpaperController');
        Route::resource('sections', 'SectionController');
        Route::resource('contacts', 'ContactController')->only(['index', 'show', 'update']);
        Route::resource('main-member', 'MainMemberController');
        Route::resource('benefits', 'BenefitController');
        });
    }
);
