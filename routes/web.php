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

Route::get('/download/{file}', function($file){
	$path = storage_path('app/public/files/'.$file);
	return response()->download($path);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('centre', 'CentreController'); 	//CRUD


Route::resource('contactPerson', 'ContactPersonController');	//CRUD
