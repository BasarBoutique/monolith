<?php

use App\Http\Controllers\Comment\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('course-comments', [CommentController::class, 'showCommentsOfCourse']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('create-comment', [CommentController::class, 'createComment']);
    // Route::put('edit-comment/{commentId}', [CommentController::class,'disableComment']);
    Route::put('disable-comment/{commentId}', [CommentController::class,'disableComment']);
});
