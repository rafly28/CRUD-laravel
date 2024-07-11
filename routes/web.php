<?php

use App\Http\Controllers\karyawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('karyawan',karyawanController::class);