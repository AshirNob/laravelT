<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;
use App\Http\Controllers\portal;
use Illuminate\Support\Facades\Auth;

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
    Route::group(['middleware' => ['auth','prevent-back-history','cors']], function () {
        Route::get('/home',function(){return view('master');})->name('home');
        Route::get('/dashboard',[test::class,'LoadHome'])->name('dashboard');
        Route::get('/table',[test::class,'LoadTable'])->name('table');
        Route::get('/',[portal::class,'main']);
        
    });

   
    
  // 

