<?php

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

// Candidate auth
//Route::group(['prefix' => 'users'], function(){
Auth::routes(['verify' => true]);
Route::get('/login/companies', 'Auth\LoginController@showCompanyLoginForm');
Route::post('login/companies', 'Auth\LoginController@loginCompany')->name('companies.login');
Route::get('/register/companies', 'Auth\RegisterController@showCompanyRegistrationForm');
Route::post('register/companies', 'Auth\RegisterController@registerCompany')->name('companies.register');
//});
// Candidate routes
Route::group(['prefix' => 'me'], function($dashboard){
    $dashboard->get('/', 'HomeController@index')->name('home');
});

// Authentication for companies
/**
 Route::group(['prefix' => 'companies', 'namespace' => 'Auth'], function ($auth) {
    $auth->get('/login', 'LoginController@showCompanyLoginForm');
    $auth->post('login', 'LoginController@loginCompany')->name('companies.login');
    $auth->get('/register', 'RegisterController@showCompanyRegistrationForm');
    $auth->post('register', 'RegisterController@registerCompany')->name('companies.register');
    // $auth->get('/email/resend', 'VerificationController@resend')->name('companies.verification.resend');
    // $auth->get('/email/verify', 'VerificationController@show')->name('companies.verification.notice');
    // $auth->get('/email/verify/{id}', 'VerificationController@verify')->name('companies.verification.verify');
    // $auth->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('companies.password.email');
    // $auth->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('companies.password.request');
    // $auth->post('password/reset', 'ForgotPasswordController@reset')->name('companies.password.update');
    // $auth->get('password/reset/{token}', 'ForgotPasswordController@showResetForm')->name('companies.password.reset');
});*/
// Companies routes
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:company', 'namespace' => 'Company'], function ($admin) {
    $admin->get('/', 'AdminController@home')->name('companies.admin');
    $admin->group(['prefix' => 'jobs'], function($job){
        $job->get('/', 'JobController@index')->name('companies.jobs');
        $job->post('/', 'JobController@addJob')->name('companies.jobs.add');
        $job->get('/{job}', 'JobController@jobDetails')->name('companies.jobs.details');
        $job->patch('/{job}', 'JobController@updateJob')->name('companies.jobs.update');
        $job->delete('/{job}', 'JobController@updateJob')->name('companies.jobs.update');
    });
});
