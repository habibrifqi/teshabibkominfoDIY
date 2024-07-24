<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\TokenInvalidyak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/generate-token', [AuthController::class, 'generateToken']);
Route::post('/login-with-token', [AuthController::class, 'loginWithToken']);

Route::get('/tes/{nomor}', [ContactController::class, 'api'])->name('api');
