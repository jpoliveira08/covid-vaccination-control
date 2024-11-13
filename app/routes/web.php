<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VaccineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('vaccine/search', [VaccineController::class, 'search']);
Route::resource('vaccine', VaccineController::class)
    ->except('edit');

Route::get('employee/{employee}/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
Route::resource('employee', EmployeeController::class);
