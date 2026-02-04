<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;


Route::get('/',[HotelController::class,'index']);
Route::resource('hotels', HotelController::class);
Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Route::get('/room', function () {
    return view('create');
=======
Route::get('/sincription', function () {
    return view('/authentification/regester');
});
;
Route::get('/longin', function () {
    return view('/authentification/connection');
>>>>>>> 7312c48937fa773e357afec2ab848103287b04b3
});
