<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Email\VerificationController;
use App\Http\Controllers\Permission\RolController;
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
    Route::post('login', 'App\Http\Controllers\Auth\AuthController@login')->name('login')->middleware('validateAuth');
    Route::post('signup', 'App\Http\Controllers\Auth\AuthController@signUp');

    Route::middleware(['signed'])->group(function () {
        Route::post('email/verification-notification', [VerificationController::class, 'sendVerificationEmail'])->name('verification.notice');
        Route::get('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::get('user', 'App\Http\Controllers\Auth\AuthController@user');
        Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout');

    });

});


Route::group(['prefix' => 'permissions'], function() {
    Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
        Route::post('create-rol', [RolController::class, 'createRol']);
        Route::get('roles', [RolController::class, 'showRoles']);
        Route::post('assign-rol-user', [RolUserController::class, 'assignRolToUser']);
    });
});

