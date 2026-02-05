<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;

<<<<<<< HEAD
// Route::get('/',[HotelController::class,'index']);
Route::resource('hotels', HotelController::class);


=======

// Route::get('/',[HotelController::class,'index']);
// Route::resource('hotels', HotelController::class);
>>>>>>> 61a07b2fd87a1178a8e5ab398ea8f9911f157014
Route::get('/', function () {
    return view('welcome');
});
Route::resource('authentification', UserController::class);
<<<<<<< HEAD
Route::post('/authentification/login', [UserController::class,'login']);



=======
>>>>>>> 61a07b2fd87a1178a8e5ab398ea8f9911f157014
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
<<<<<<< HEAD
Route::resource('/categories', CategoryController::class); 
=======

Route::resource('tags', TagController::class);
Route::resource('properties', PropertyController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('rooms', RoomController::class);
>>>>>>> 61a07b2fd87a1178a8e5ab398ea8f9911f157014
