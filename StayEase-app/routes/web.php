<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaimentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GerantController;






Route::get('/', function () {
    return view('welcome');
});
Route::post('/authentification/logout', [UserController::class, 'logout'])->name("user.logout");
Route::resource('authentification', UserController::class);
Route::post('/authentification/login', [UserController::class, 'login']);

Route::get('/gerant/dashbord', [GerantController::class, '  index'])->name("gerant.index");


Route::post('/authentification/login', [UserController::class, 'login']);




Route::resource('hotels', HotelController::class);

route::middleware('admin', )->group(function () {
    Route::put('/admin/{hotel}/approve', [AdminController::class, 'approve'])->name('admin.approve');
    Route::put('/admin/{hotel}/reject', [AdminController::class, 'reject'])->name('admin.reject');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.user');
    Route::put('/users/{user}/update', [AdminController::class, 'updateUserStatus'])->name('admin.users.update');
    Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
    // Route::resource('admin', AdminController::class);
    
    });
Route::resource('user', UserController::class);


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
Route::resource('categories', CategoryController::class);
Route::resource('room/reservation/paiment', PaimentController::class);
Route::resource('rooms', RoomController::class);
