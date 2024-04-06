<?php

use App\Http\Controllers\Front\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::view('login', 'front.auth.login')->name('login');
    Route::view('register', 'front.auth.register')->name('register');
});
