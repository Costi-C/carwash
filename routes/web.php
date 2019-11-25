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





Route::group(['middleware' => 'auth'], function(){	
	Route::get('/all-orders', 'OrdersController@getAllOrders');
	Route::post('/all-orders/remove', 'OrdersController@removeOrder');

	Route::get('/orders/{id}', 'OrdersController@setOrder');
	Route::post('/orders/{id}', 'OrdersController@updateOrder');
	Route::get('/', 'OrdersController@newOrder');
	Route::post('/orders', 'OrdersController@saveOrder');

	Route::get('categories/{id}/services', 'OrdersController@getServicesForCategory');

	Route::get('/test', 'OrdersController@test');

	Route::get('/logout', 'OrdersController@getLogout');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function (){
	Route::get('/', 'HomeController@homeDetails');
    Route::post('/', 'HomeController@updateType');

    Route::get('/employees', 'EmployeeController@addEmployee');
	Route::post('/employees', 'EmployeeController@saveEmployee');
	Route::post('/employees/remove', 'EmployeeController@removeEmployee');
    Route::get('/employees/track', 'EmployeeController@getEmployees');
    Route::post('/employees/track', 'EmployeeController@showEmployeeTrack');

    Route::get('/vehicles', 'VehicleController@getVehicles');
    Route::get('/vehicles/packages', 'VehicleController@getPackage');
    Route::post('/vehicles/packages', 'VehicleController@updatePackage');
    Route::post('/vehicles/remove', 'VehicleController@removeVehicle');
    Route::post('/vehicles/packages/add', 'VehicleController@addPackage');
    Route::post('/vehicles/packages/remove', 'VehicleController@removePackage');

    Route::get('/bistro/packages', 'BistroController@getPackage');
    Route::post('/bistro/packages/add', 'BistroController@addPackage');
    Route::post('/bistro/packages/remove', 'BistroController@removePackage');
    Route::post('/bistro/packages/update', 'BistroController@updatePackage');
    Route::get('/orders/canceled', 'AdminOrdersController@getCanceledOrders');
    Route::get('/logout', 'HomeController@getLogout');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('login/create', 'Auth\LoginController@setPass');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
