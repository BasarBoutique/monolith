<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Email\VerificationController;
use Illuminate\Support\Facades\Route;

Route::post('login', 'Auth\AuthController@login')->name('login')->middleware('validateAuth');
Route::post('signup', 'Auth\AuthController@signUp');

Route::middleware(['signed'])->group(function () {
    Route::post('email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
});

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', 'Auth\AuthController@user');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('users/search', [UserController::class, 'searchUsers']);
    });
});
