<?php


use App\Http\Controllers\BrandController;

//Route::get('/','')->name('/');
Route::get('/', function () {
    return view('customer.customerLending');
});
Route::get('/search', 'SearchController@search')->name('search');
Route::get('/getServiceHome','ServiceController@getServiceHome')->name('getService.home');
Route::get('/getServiceHome/allServices','ServiceController@allService')->name('getService.allService');
Route::get('/getServiceHome/search/services','ServiceController@searchService')->name('getService.searchService');
Route::get('/getServiceHome/workshop/services/{id}','ServiceController@workshopService')->name('getService.workshopService');
Route::get('/getServiceHome/request/{id}','ServiceController@request')->name('requestService');
Route::post('/request/store','ServiceController@saveRequest')->name('requestServiceSave');
Route::get('/ecommerce','GariSaraoController@index')->name('/');


Route::get('/category/{id}/{name}','GariSaraoController@category')->name('category');
Route::get('/product-details/{id}','GariSaraoController@productDetails')->name('product-details');

Route::post('/cart','CartController@addCart')->name('add-cart');
Route::get('/cart','CartController@viewCart')->name('view-cart');
Route::get('/cart/delete/{id}','CartController@deleteCart')->name('delete-cart');
Route::post('/cart/update','CartController@updateCart')->name('edit-cart');

Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/sign-up','CheckoutController@signUp')->name('checkout-sign-up');

Route::post('/checkout/customer-login','CheckoutController@customerLoginCheck')->name('customer-login');
Route::post('/checkout/customer-logout','CheckoutController@customerLogout')->name('customer-logout');
Route::get('/checkout/new-customer-login','CheckoutController@newCustomerLogin')->name('new-customer-login');

//Route::group(['prefix'=>'customer'],function(){
//
////    Route::get('/','EmployerController@index')->name('employer.home');
//    Route::get('/login', 'customer\LoginController@showLoginForm')->name('customer.login');
//    Route::post('/login', 'customer\LoginController@login')->name('customer.login.submit');
//    Route::get('/register', 'customer\RegisterController@showRegForm')->name('customer.register');
//
//    Route::post('/register', 'customer\RegisterController@register')->name('customer.register.submit');
//
//    Route::get('logout', 'customer\LoginController@logout')->name('customer.logout');
//});

Route::get('/checkout/shipping','CheckoutController@shipping');
Route::post('/checkout/shipping','CheckoutController@saveShippingInfo')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm')->name('checkout-payment');
Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
Route::get('/checkout/payment/confirm','CheckoutController@confirmPayment');

Route::get('/checkout/payment/stripe', 'CheckoutController@stripe');
Route::post('/stripe', 'CheckoutController@stripePost')->name('stripe.post');

//ssl commerze routes---
Route::post('/success', 'CheckoutController@success');
Route::post('/fail', 'CheckoutController@fail');
Route::post('/cancel',  'CheckoutController@cancel');

Route::group(['prefix'=>'autoMobileWorkshop'], function (){
    Route::get('/login', 'workshop\LoginController@showLoginForm')->name('autoMobileWorkshop.login');
    Route::post('/login', 'workshop\LoginController@login')->name('autoMobileWorkshop.login.submit');
    Route::get('/register', 'workshop\RegisterController@showRegForm')->name('autoMobileWorkshop.register');
    Route::post('/register', 'workshop\RegisterController@register')->name('autoMobileWorkshop.register.submit');
    Route::get('logout', 'workshop\LoginController@logout')->name('autoMobileWorkshop.logout');

});

Auth::routes();
Route::middleware('auth:autoMobileWorkshop')->prefix('autoMobileWorkshop')->group(function (){
    Route::get('/dashboard', 'workshop\DashboardController@home')->name('autoMobileWorkshop.dashboard');
//    Route::resource('automobileEngineer','workshop\AutomobileEngineerController');
    Route::get('/automobileEngineer/new', 'workshop\AutomobileEngineerController@create')->name('autoMobileWorkshop.automobileEngineer.new');
    Route::post('/automobileEngineer/new', 'workshop\AutomobileEngineerController@store')->name('autoMobileWorkshop.automobileEngineer.save');
    Route::get('/automobileEngineer/list', 'workshop\AutomobileEngineerController@index')->name('autoMobileWorkshop.automobileEngineer.list');
    Route::get('/automobileEngineer/edit/{id}', 'workshop\AutomobileEngineerController@edit')->name('autoMobileWorkshop.automobileEngineer.edit');
    Route::put('/automobileEngineer/update/{id}', 'workshop\AutomobileEngineerController@update')->name('autoMobileWorkshop.automobileEngineer.update');
//    Route::get('/automobileEngineer/list', 'workshop\AutomobileEngineerController@index')->name('autoMobileWorkshop.automobileEngineer.list');
    Route::delete('/automobileEngineer/delete/{id}', 'workshop\AutomobileEngineerController@destroy')->name('autoMobileWorkshop.automobileEngineer.delete');
    Route::get('logout', 'workshop\LoginController@logout')->name('autoMobileWorkshop.logout');
    //auto mobile service
    Route::get('/automobileService/new', 'workshop\AutomobileServiceController@create')->name('autoMobileWorkshop.automobileService.new');
    Route::post('/automobileService/new', 'workshop\AutomobileServiceController@store')->name('autoMobileWorkshop.automobileService.save');
    Route::get('/automobileService/list', 'workshop\AutomobileServiceController@index')->name('autoMobileWorkshop.automobileService.list');
    Route::get('/automobileService/edit/{id}', 'workshop\AutomobileServiceController@edit')->name('autoMobileWorkshop.automobileService.edit');
    Route::put('/automobileService/update/{id}', 'workshop\AutomobileServiceController@update')->name('autoMobileWorkshop.automobileService.update');
    Route::delete('/automobileService/delete/{id}', 'workshop\AutomobileServiceController@destroy')->name('autoMobileWorkshop.automobileService.delete');
    // auto mobile service price
    Route::get('/automobileServicePrice/new', 'workshop\AutomobileServicePriceController@create')->name('autoMobileWorkshop.automobileServicePrice.new');
    Route::post('/automobileServicePrice/new', 'workshop\AutomobileServicePriceController@store')->name('autoMobileWorkshop.automobileServicePrice.save');
    Route::get('/automobileServicePrice/list', 'workshop\AutomobileServicePriceController@index')->name('autoMobileWorkshop.automobileServicePrice.list');
    Route::get('/automobileServicePrice/edit/{id}', 'workshop\AutomobileServicePriceController@edit')->name('autoMobileWorkshop.automobileServicePrice.edit');
    Route::put('/automobileServicePrice/update/{id}', 'workshop\AutomobileServicePriceController@update')->name('autoMobileWorkshop.automobileServicePrice.update');
    Route::delete('/automobileServicePrice/delete/{id}', 'workshop\AutomobileServicePriceController@destroy')->name('autoMobileWorkshop.automobileServicePrice.delete');

});
    Route::get('/home', 'HomeController@index')->name('home');
//start category
    Route::get('/category/add', 'CategoryController@addCategory')->name('add-category');
    Route::post('/category/new','CategoryController@newCategory')->name('new-category');
    Route::get('/category/manage','CategoryController@manageCategory')->name('manage-category');
    Route::get('/category/manage/published/{id}','CategoryController@publishedCategory')->name('published-category');
    Route::get('/category/manage/unpublished/{id}','CategoryController@unpublishedCategory')->name('unpublished-category');
    Route::post('/category/manage/update','CategoryController@updateCategory')->name('update-category');
    Route::get('/category/manage/delete/{id}','CategoryController@deleteCategory')->name('delete-category');

//end category
//start brand

    Route::get('/brand/add','BrandController@addBrand')->name('add-brand');
    Route::post('/brand/new','BrandController@newBrand')->name('new-brand');
    Route::get('/brand/view','BrandController@viewBrand')->name('view-brand');
    Route::get('/brand/published/{id}','BrandController@publishedBrand')->name('published-brand');
    Route::get('/brand/unpublished/{id}','BrandController@unpublishedBrand')->name('unpublished-brand');
    Route::post('/brand/update','BrandController@updateBrand')->name('edit-brand');
    Route::get('/brand/delete/{id}','BrandController@deleteBrand')->name('delete-brand');

//end brand

//Product Route Start Section

    Route::get('/product/add','ProductController@addProduct')->name('add-product');
    Route::post('/product/new','ProductController@newProduct')->name('new-product');
    Route::get('/product/view','ProductController@viewProduct')->name('view-product');
    Route::post('/product/update/{id}','ProductController@updateProduct')->name('update-product');
    Route::get('/product/delete/{id}','ProductController@deleteProduct')->name('delete-product');


//Product Route End Section

    Route::get('/order/manage-order','OrderController@manageOrderInfo')->name('manage-order');
    Route::get('/order/view-order-detail/{id}','OrderController@viewOrderDetail')->name('view-order-detail');
    Route::get('/order/view-order-invoice/{id}','OrderController@viewOrderInvoice')->name('view-order-invoice');
    Route::get('/order/download-order-invoice/{id}','OrderController@downloadOrderInvoice')->name('download-order-invoice');

//automobile workshop section
    Route::resource('automobileWorkshop','Admin\AutoMobileWorkshopController');
    Route::resource('automobileEngineer','Admin\AutomobileEngineerController');



Addchat::routes();
