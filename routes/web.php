<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('home');
});
Route::get('/about', function () {
    return inertia('about');
});
Route::get('/contact', function () {
    return inertia('contact');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class)
        ->names('admin.users');
        Route::post('logout',[AuthController::class, 'logout'])->name('logout');
});
Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'loginStore'])->name('login.store');
