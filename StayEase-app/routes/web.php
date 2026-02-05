<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Models\Reservation;

// Route::get('/',[HotelController::class,'index']);
Route::resource('hotels', HotelController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/room', function () {
    return view('create');
});

Route::get('/sincription', function () {
    return view('/authentification/regester');
});

Route::get('/longin', function () {
    return view('/authentification/connection');
});
Route::resource('/categories', CategoryController::class); 

Route::get('rooms/check-room', function () {
    return view('categories.checkRooms');
});
Route::post('/rooms/check-room',[ReservationController::class,'index'])->name('room.check-rooms');