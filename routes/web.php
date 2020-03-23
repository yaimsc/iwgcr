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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('pages.index'); 
// });

Route::get('/', 'IndexController@index')->name('index'); 
Route::get('/pdf', 'IndexController@pdf')->name('pdf');

Route::get('/download/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->download($path);
});

Route::get('/view/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->file($path);
});

Route::get('admin', 'AdminController@index')->name('admin');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Verification Routes
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// ---- FORM ------

Route::resource('centre', 'CentreController'); 	//CRUD

Route::resource('contactPerson', 'ContactPersonController');	//CRUD

Route::resource('door', 'DoorController'); //CRUD

// --- SIGN OFF FORM -------

Route::resource('installer', 'InstallerController'); //CRUD

// --- LOCAL HOME BU USER -----

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home/centres', 'HomeController@centres')->name('home.centres')->middleware('auth');
Route::get('/home/centreData/{name}', 'HomeController@centreData')->name('home.centreData')->middleware('auth');
Route::get('/home/doors', 'HomeController@doors')->name('home.doors')->middleware('auth');
Route::get('/home/contacts', 'HomeController@contactPeople')->name('home.contacts')->middleware('auth'); 


// ---- FILTERS -----
Route::get('/centres/search', 'SearchController@centres')->name('centres.search');
Route::get('/contacts/search', 'SearchController@contactPeople')->name('contacts.search');
Route::get('/doors/search', 'SearchController@doors')->name('doors.search'); 
Route::get('/users/search', 'SearchController@users')->name('users.search');


// ----- SUPER ADMIN ------

Route::get('/superadmin', 'SuperadminController@index')->name('superadmin')->middleware('auth'); 
Route::get('/superadmin/centres', 'SuperadminController@centres')->name('superadmin.centres')->middleware('auth');
Route::get('/superadmin/centreData/{name}', 'SuperadminController@centreData')->name('superadmin.centreData')->middleware('auth');
Route::get('/superadmin/contacts', 'SuperadminController@contactPeople')->name('superadmin.contacts')->middleware('auth');
Route::get('/superadmin/doors', 'SuperadminController@doors')->name('superadmin.doors')->middleware('auth');
Route::get('/superadmin/users', 'SuperadminController@users')->name('superadmin.users')->middleware('auth');
Route::get('/superadmin/editCentreData/{name}', 'SuperadminController@edit')->name('superadmin.edit')->middleware('auth');

