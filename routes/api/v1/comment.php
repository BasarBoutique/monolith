<?php

use App\Http\Controllers\Comment\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('comment', [CommentController::class, 'Comment']);
// Route::get();
// Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
//     Route::post();
//     Route::put();
//     Route::delete();
// });
