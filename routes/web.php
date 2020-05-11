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
Route::post('/ajax/{name}',array('as'=>'index.ajax','uses'=>'IndexController@ajax')); 
Route::get('/pdf', 'IndexController@pdf')->name('pdf');
Route::get('/storeForm', 'IndexController@storeForm')->name('storeForm');
Route::get('/privacy', 'IndexController@privacy')->name('privacy');

Route::get('/download/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->download($path);
});

Route::get('/view/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->file($path);
});

Route::get('/view/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->file($path);
});



// ---- FORM ------ //

Route::resource('centre', 'CentreController'); 	//CRUD

Route::resource('contactPerson', 'ContactPersonController');	//CRUD

Route::resource('door', 'DoorController'); //CRUD

// --- SIGN OFF FORM ------- //

//installer
Route::resource('installer', 'InstallerController'); //CRUD

//Sign-Off
Route::resource('sign-off', 'SignOffController');


// ---- FILTERS ----- //

Route::get('/centres/search', 'SearchController@centres')->name('centres.search');
Route::get('/contacts/search', 'SearchController@contactPeople')->name('contacts.search');
Route::get('/doors/search', 'SearchController@doors')->name('doors.search'); 
Route::get('/users/search', 'SearchController@users')->name('users.search');


// -------- ADMIN PART --------- //

Route::get('admin', 'AdminController@index')->name('admin')->middleware('ipcheck');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('ipcheck');
Route::post('login', 'Auth\LoginController@login')->middleware('ipcheck');
Route::post('logout', 'Auth\LoginController@logout')->name('logout')->middleware('ipcheck');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('ipcheck');
Route::post('register', 'Auth\RegisterController@register')->middleware('ipcheck');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request')->middleware('ipcheck');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email')->middleware('ipcheck');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')->middleware('ipcheck');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->middleware('ipcheck');
// Verification Routes
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice')->middleware('ipcheck');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify')->middleware('ipcheck');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend')->middleware('ipcheck');

// --- LOCAL HOME BU USER -----

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'ipcheck');
Route::get('/home/centres', 'HomeController@centres')->name('home.centres')->middleware('auth', 'ipcheck');
Route::get('/home/centreData/{number}', 'HomeController@centreData')->name('home.centreData')->middleware('auth', 'ipcheck');
Route::get('/home/doors', 'HomeController@doors')->name('home.doors')->middleware('auth', 'ipcheck');
Route::get('/home/contacts', 'HomeController@contactPeople')->name('home.contacts')->middleware('auth', 'ipcheck'); 


// ----- SUPER ADMIN ------

Route::get('/superadmin', 'SuperadminController@index')->name('superadmin')->middleware('auth'); 
Route::get('/superadmin/centres', 'SuperadminController@centres')->name('superadmin.centres')->middleware('auth');
Route::get('/superadmin/centreData/{number}', 'SuperadminController@centreData')->name('superadmin.centreData')->middleware('auth');
Route::get('/superadmin/contacts', 'SuperadminController@contactPeople')->name('superadmin.contacts')->middleware('auth');
Route::get('/superadmin/doors', 'SuperadminController@doors')->name('superadmin.doors')->middleware('auth');
Route::get('/superadmin/users', 'SuperadminController@users')->name('superadmin.users')->middleware('auth');
Route::get('/superadmin/editCentreData/{number}', 'SuperadminController@edit')->name('superadmin.edit')->middleware('auth');

