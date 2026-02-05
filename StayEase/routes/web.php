<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;





Route::get('/', function () {
    return view('welcome');
});
Route::resource('authentification', UserController::class);



Route::resource('hotels', HotelController::class);
Route::put('/admin/{hotel}/approve', [AdminController::class, 'approve'])->name('admin.approve'); 
Route::put('/admin/{hotel}/reject', [AdminController::class, 'reject'])->name('admin.reject');
Route::resource('admin', adminController::class);


Route::get('/room', function () {
    return view('create');
});

Route::get('/sincription', function () {
    return view('/authentification/regester');
});


Route::resource('/categories', CategoryController::class); 
