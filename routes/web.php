<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test;
use App\Http\Controllers\portal;
use App\Http\Controllers\shop;
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
        Route::get('/addshop',[shop::class,'AddShop'])->name('addshop');
        Route::post('/submitshop',[shop::class,'SubmitShop'])->name('submitshop');
        Route::get('/viewshops',[shop::class,'ViewAllShop'])->name('viewshops');
        Route::get('/shopfields/{id}',[shop::class,'ShopFields']);
    });

   
    
  // 

