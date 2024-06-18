<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PhoneVerificationController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('postimage',[ImageController::class,'store']);
Route::get('retimage/{id}',[ImageController::class,'retrieveImage']);

Route::get('/login', [ApiController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ApiController::class, 'profile']);
    Route::get('/logout', [ApiController::class, 'logout']);

    Route::post('/phone/verify', [PhoneVerificationController::class, 'sendVerificationCode']);
    Route::post('/phone/verify/code', [PhoneVerificationController::class, 'verifyCode']);

});
