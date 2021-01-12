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
    return view('customer.customerLending');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/home','AdminController@index');
//Route::get('admin','SuperAdmin\LoginController@showLoginForm')->name('admin.login');
//Route::post('admin','SuperAdmin\LoginController@login');
//Route::POST  ( 'admin-password/email','SuperAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//
//Route::GET('admin-password/reset','SuperAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//Route::POST('admin-password/reset','SuperAdmin\ResetPasswordController@reset');
//Route::GET('admin-password/reset/{token}','SuperAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
//Route::get('/home','HomeController@home');

Route::group(['prefix'=>'customer'],function(){

//    Route::get('/','EmployerController@index')->name('employer.home');
    Route::get('/login', 'customer\LoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'customer\LoginController@login')->name('customer.login.submit');
    Route::get('/register', 'customer\RegisterController@showRegForm')->name('customer.register');

    Route::post('/register', 'customer\RegisterController@register')->name('customer.register.submit');

    Route::get('logout', 'customer\LoginController@logout')->name('customer.logout');
});
Route::get('/customerHome','CustomerController@showCustomerHome')->name('customer.home');
Route::group(['prefix'=>'autoMobileEngineer'],function(){

//    Route::get('/','EmployerController@index')->name('employer.home');
    Route::get('/login', 'autoMobileEngineer\LoginController@showLoginForm')->name('autoMobileEngineer.login');
    Route::post('/login', 'autoMobileEngineer\LoginController@login')->name('autoMobileEngineer.login.submit');
    Route::get('/register', 'autoMobileEngineer\RegisterController@showRegForm')->name('autoMobileEngineer.register');

    Route::post('/register', 'autoMobileEngineer\RegisterController@register')->name('autoMobileEngineer.register.submit');

    Route::get('logout', 'autoMobileEngineer\LoginController@logout')->name('autoMobileEngineer.logout');
});
Route::get('/autoMobileEngineerHome','AutoMobileEngineerController@showAutoMobileEngineer')->name('autoMobileEngineer.home');

Route::group(['prefix'=>'superAdmin'],function(){

//    Route::get('/','EmployerController@index')->name('employer.home');
    Route::get('/login', 'superAdmin\LoginController@showLoginForm')->name('superAdmin.login');
    Route::post('/login', 'superAdmin\LoginController@login')->name('superAdmin.login.submit');
    Route::get('/register', 'superAdmin\RegisterController@showRegForm')->name('superAdmin.register');

    Route::post('/register', 'superAdmin\RegisterController@register')->name('superAdmin.register.submit');

    Route::get('logout', 'superAdmin\LoginController@logout')->name('superAdmin.logout');
});
Route::get('/superAdminHome','SuperAdminController@showSuperAdmin')->name('superAdmin.home');

//Route::get('/getServiceHome', function () {
//    return view('customer.getServiceHome')->name('getService.home');
//});
Route::get('/getServiceHome','ServiceController@getServiceHome')->name('getService.home');
Route::get('/epartsForCustomer','EcommerceController@ecommerce')->name('epartsForCustomer.home');

Route::get('/homeCheck', function () {
    return view('customer.homeCheck');
});
//Route::get('/customerLending', function () {
//    return view('customer.customerLending');
//});
Route::get('/lendingCheck', function () {
    return view('customer.lendingCheck');
});
Route::get('/ecommerceHome', function () {
    return view('customer.ecommerceForCustomer');
});

Route::resource('productCategory','SuperAdmin\CategoryController');
