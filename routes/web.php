<?php

use Illuminate\Support\Facades\Route;

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
     Route::post('/home', "HomeController@create");
  Route::post('/home', "HomeController@store");
  Route::get('/home', function(){   
  	if(Auth::user()->manager==0){
  	     return view('home');	  	     
  	}else{
  		$posts['posts'] = \App\Post::all();
  		$users['users'] = \App\User::all();
  	     return view('managerhome', $users, $posts );	
  	}
    })->name('home');
});
