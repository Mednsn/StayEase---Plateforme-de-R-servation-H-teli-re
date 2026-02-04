<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


Route::get('/',[HotelController::class,'index']);
Route::resource('hotels', HotelController::class);