<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::middleware('auth')->group(function () {
    Route::resource('/user', UserController::class)->names('profile')->only(['index', 'store']);
    Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/register', [HomeController::class, 'register'])->name('register');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/groom', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/groom/{id}', [AdminController::class, 'update'])->name('admin.update');
});
