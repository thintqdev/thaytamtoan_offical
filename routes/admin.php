<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AskController;
use App\Http\Controllers\Admin\CategoryControler;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('web')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('auth.login');
        Route::get('/login', 'showLoginForm')->name('auth.login.form');
        Route::get('/logout', 'logout')->name('auth.logout');
    });

    Route::resource('documents', DocumentController::class)->names([
        'index' => 'documents.index',
        'create' => 'documents.create',
        'store' => 'documents.store',
        'show' => 'documents.show',
        'edit' => 'documents.edit',
        'update' => 'documents.update',
        'destroy' => 'documents.destroy',
    ]);

    Route::resource('asks', AskController::class)->names([
        'index' => 'asks.index',
        'show' => 'asks.show',
        'destroy' => 'asks.destroy',
    ]);

    Route::prefix('categories')->controller(CategoryControler::class)->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::post('/', 'store')->name('categories.store');
        Route::put('/{category}', 'update')->name('categories.update');
        Route::delete('/{category}', 'destroy')->name('categories.destroy');
    });

    Route::resource('videos', VideoController::class)->names([
        'index' => 'videos.index',
        'create' => 'videos.create',
        'store' => 'videos.store',
        'edit' => 'videos.edit',
        'update' => 'videos.update',
        'destroy' => 'videos.destroy',
    ]);

    Route::resource('exams', ExamController::class)->names([
        'index' => 'exams.index',
        'create' => 'exams.create',
        'store' => 'exams.store',
        'edit' => 'exams.edit',
        'update' => 'exams.update',
        'destroy' => 'exams.destroy',
    ]);

    // Route::controller(ImageController::class)->group(function () {
    //     Route::post('/logo', 'saveLogo')->name('logo.store');
    //     Route::get('/logo', 'showLogoForm')->name('logo.form');
    // });
});
