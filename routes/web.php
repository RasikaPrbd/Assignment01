<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return redirect('login');
});

Route::fallback(function () {
    return redirect('login');
});



Route::middleware(['auth', RoleMiddleware::class])->group(function () {

    Route::resource('users', UserController::class);

    Route::resource('customers', CustomerController::class);

    Route::resource('products', ProductController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::get('/user-dashboard', function () {
    return view('user-dashboard');
})->name('user-dashboard')->middleware(['auth']);
