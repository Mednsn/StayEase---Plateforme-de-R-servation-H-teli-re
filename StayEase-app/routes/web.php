<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;

// Route::get('/',[HotelController::class,'index']);
Route::resource('hotels', HotelController::class);


Route::get('/', function () {
    return view('welcome');
});
Route::resource('authentification', UserController::class);


