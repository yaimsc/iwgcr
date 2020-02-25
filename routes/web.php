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

// ---- FORM ------

Route::resource('centre', 'CentreController'); 	//CRUD

Route::resource('contactPerson', 'ContactPersonController');	//CRUD

Route::resource('door', 'DoorController'); //CRUD

// --- LOCAL HOME BU USER -----

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/centres', 'HomeController@centres')->name('home.centres');
Route::get('/home/doors', 'HomeController@doors')->name('home.doors');
Route::get('/home/contacts', 'HomeController@contactPeople')->name('home.contacts'); 


// ---- FILTERS -----
Route::get('/centres/search', 'SearchController@centres')->name('centres.search');
Route::get('/contacts/search', 'SearchController@contactPeople')->name('contacts.search');
Route::get('/doors/search', 'SearchController@doors')->name('doors.search'); 
Route::get('/users/search', 'SearchController@users')->name('users.search');


// ----- SUPER ADMIN ------

Route::get('/superadmin', 'SuperadminController@index')->name('superadmin'); 
Route::get('/superadmin/centres', 'SuperadminController@centres')->name('superadmin.centres');
Route::get('/superadmin/contacts', 'SuperadminController@contactPeople')->name('superadmin.contacts');
Route::get('/superadmin/doors', 'SuperadminController@doors')->name('superadmin.doors');
Route::get('/superadmin/users', 'SuperadminController@users')->name('superadmin.users');

