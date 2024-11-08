<?php

use App\Http\Controllers\VaccineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::resource('vaccine', VaccineController::class);
