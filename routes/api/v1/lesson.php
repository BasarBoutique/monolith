<?php
use App\Http\Controllers\Lesson\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('lesson',[LessonController::class, 'Lesson']);
Route::get('show-lesson/{lesson}',[LessonController::class,'showLesson']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-lesson', [LessonController::class,'createlesson']);
    Route::put('update-lesson/{lesson}', [LessonController::class,'updateLesson']);
    Route::delete('delete-lesson', [LessonController::class,'deleteLesson']);
});
