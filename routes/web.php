<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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


Auth::routes();

Route::group(['middleware'=>['web', 'auth']],function(){
    Route::get('/', function(){
	   return view('welcome');
   });
  Route::get('/home', 'HomeController@index')->name('home'); 
  Route::post('/home', "HomeController@store");
  Route::get('test-email', 'JobController@enqueue');
  
});
 