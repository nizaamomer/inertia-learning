<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('home');
});
Route::get('/about', function () {
    return inertia('about');
});
Route::get('/contact', function () {
    return inertia('contact');
});
Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class)
        ->names('admin.users');
});
