<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});Route::get('/sincription', function () {
    return view('/authentification/regester');
});
;Route::get('/longin', function () {
    return view('/authentification/connection');
});
