<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/login', function () { return view('login'); });
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/register', function () { return view('register'); });
Route::post('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth'); 
