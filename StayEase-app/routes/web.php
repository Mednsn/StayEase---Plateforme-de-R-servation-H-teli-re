<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;





Route::get('/', function () {
    return view('welcome');
});
Route::resource('authentification', UserController::class);
Route::post('/authentification/login', [UserController::class, 'login']);


Route::resource('hotels', HotelController::class);
Route::put('/admin/{hotel}/approve', [AdminController::class, 'approve'])->name('admin.approve');
Route::put('/admin/{hotel}/reject', [AdminController::class, 'reject'])->name('admin.reject');
Route::resource('admin', adminController::class);
Route::get('/sincription', function () {
    return view('/authentification/regester');
});

Route::get('/longin', function () {
    return view('/authentification/connection');
});

Route::get('rooms/check-room', function () {
    return view('categories.checkRooms');
});
Route::post('/rooms/check-room', [ReservationController::class, 'index'])->name('room.check-rooms');
Route::resource('tags', TagController::class);
Route::resource('properties', PropertyController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('rooms', RoomController::class);
