<?php

use App\Http\Controllers\Email\VerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
    Route::post('signup', 'App\Http\Controllers\Auth\AuthController@signUp');

    Route::middleware(['signed'])->group(function () {
        Route::post('email/verification-notification', [VerificationController::class, 'sendVerificationEmail']);
        Route::get('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');

    });

    Route::middleware(['auth:api','verified'])->group(function () {
        Route::get('user', 'App\Http\Controllers\Auth\AuthController@user');
    });

});
