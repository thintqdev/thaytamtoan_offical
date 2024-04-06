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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register');
    Route::get('forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgot.password');
    Route::get('reset-password', [AuthController::class, 'passwordResetView'])->name('password.reset');
 });
