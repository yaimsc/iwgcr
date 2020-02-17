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
// Route::get('/photos', 'IndexController@photos')->name('photos');

Route::get('/download/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->download($path);
});

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/centres', 'HomeController@centre')->name('home.centres');
Route::get('home/contacts', 'HomeController@contactPerson')->name('home.contacts'); 


Route::resource('centre', 'CentreController'); 	//CRUD


Route::resource('contactPerson', 'ContactPersonController');	//CRUD

Route::resource('photos', 'PhotosController'); //CRUD
