<?php

<<<<<<< HEAD
use App\Http\Controllers\TagController;
use App\Http\Controllers\PropertyController;
=======
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
>>>>>>> a6fb4228d736298b2c24e7b8a93eba4abeb6fb52
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;





<<<<<<< HEAD
// Route::get('/',[HotelController::class,'index']);
// Route::resource('hotels', HotelController::class);
=======
>>>>>>> a6fb4228d736298b2c24e7b8a93eba4abeb6fb52
Route::get('/', function () {
    return view('welcome');
});
Route::resource('authentification', UserController::class);



Route::resource('hotels', HotelController::class);
Route::put('/admin/{hotel}/approve', [AdminController::class, 'approve'])->name('admin.approve'); 
Route::put('/admin/{hotel}/reject', [AdminController::class, 'reject'])->name('admin.reject');
Route::resource('admin', adminController::class);


Route::get('/sincription', function () {
    return view('/authentification/regester');
});

<<<<<<< HEAD
Route::get('/longin', function () {
    return view('/authentification/connection');
});

Route::resource('tags', TagController::class);

Route::resource('properties', PropertyController::class);



=======

Route::resource('/categories', CategoryController::class); 
>>>>>>> a6fb4228d736298b2c24e7b8a93eba4abeb6fb52
