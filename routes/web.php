<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::resource('cars', App\Http\Controllers\CarController::class);

Route::get('error', function () {
    return view('welcome');
})->name('verification.notice');
