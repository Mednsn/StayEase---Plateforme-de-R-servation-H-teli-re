<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


// Route::get('/',[HotelController::class,'index']);
// Route::resource('hotels', HotelController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sincription', function () {
    return view('/authentification/regester');
});

Route::get('/longin', function () {
    return view('/authentification/connection');
});

Route::resource('tags', TagController::class);

Route::resource('properties', PropertyController::class);



