<?php

use App\Http\Controllers\Comment\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('comment', [CommentController::class, 'Comment']);
Route::post('create-comment', [CommentController::class, 'createComment']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::put('remove-comment/{commentId}', [CommentController::class,'disableComment']);
});
