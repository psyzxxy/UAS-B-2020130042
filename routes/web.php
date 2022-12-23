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

RRoute::resource('item',ItemsController::class);
Route::get('/',[AppController::class,'index'])->name('index');
Route::get('/order',[OrderController::class,'order'])->name('order');

