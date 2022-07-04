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
        Route::get('/',[portal::class,'main']);
        Route::get('/table',[test::class,'LoadTable'])->name('table');
        Route::get('/addshop',[shop::class,'AddShop'])->middleware('only.ajax')->name('addshop');
        Route::post('/submitshop',[shop::class,'SubmitShop'])->middleware('only.ajax')->name('submitshop');
        Route::post('/submitaddfieldtoshop',[shop::class,'SubmitAddFieldToShop'])->middleware('only.ajax')->name('submitaddfieldtoshop');
        Route::get('/viewshops',[shop::class,'ViewAllShop'])->middleware('only.ajax')->name('viewshops');
        Route::get('/shopfields/{id}',[shop::class,'ShopFields'])->middleware('only.ajax');
        Route::post('/addshopfieldsdata',[shop::class,'AddShopFieldsData'])->middleware('only.ajax');
        Route::get('/ViewShopFields/{id}',[shop::class,'ViewShopsFields']);
        Route::get('/getshopfields',[shop::class,'GetShopsFieldsData']);
    });

   
    
  // 

