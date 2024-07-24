<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login', function () {
    return view('login');
});

// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users_update', [UserController::class, 'update'])->name('user.update');
Route::get('/users_delete', [UserController::class, 'destroy'])->name('user.delete');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
});

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('user/dashboard', [LoginController::class, 'userDashboard']);
// });




