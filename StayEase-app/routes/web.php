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

Route::post('/authentification/profile', [UserController::class, 'show'])->name("user.profile");
Route::post('/authentification/logout', [UserController::class, 'logout'])->name("user.logout");
Route::resource('authentification', UserController::class);
Route::post('/authentification/login', [UserController::class, 'login']);

Route::middleware('gerant')->group(function(){
Route::get('/gerant/chombre', [GerantController::class, 'chombre'])->name("gerant.chombre");
    Route::get('/gerant/dashbord', [GerantController::class, 'index'])->name("gerant.index");
});


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

Route::get('rooms/reservation', [ReservationController::class,'index'])->name('rooms.reservation');
Route::post('rooms/create', [ReservationController::class,'store'])->name('reservation.store');
Route::get('rooms/check-room', [ReservationController::class,'checkChambreIsaviable'])->name('rooms.check-room');
Route::resource('tags', TagController::class);
Route::resource('properties', PropertyController::class);
Route::resource('categories', CategoryController::class);
Route::resource('paiement', PaimentController::class);
Route::post('/paiement', [PaimentController::class,'index'])->name('paiement.index');
Route::post('/checkout', [PaimentController::class, 'checkout'])->name('paiement.checkout');

Route::resource('rooms', RoomController::class);
