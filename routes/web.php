<?php

use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\HomeController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('post.login');
    Route::post('register', [AuthController::class, 'register'])->name('post.register');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('post.forgot_password');
    Route::post('/reset-password/{token} ', [AuthController::class, 'resetPassword'])->name('post.reset_password');

    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register');
    Route::get('forgot-password', [AuthController::class, 'forgotPasswordView'])->name('forgot_password');
    Route::get('reset-password/{token}', [AuthController::class, 'passwordResetView'])->name('reset_password');
 });

 Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 });
