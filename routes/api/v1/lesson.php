<?php
use App\Http\Controllers\Lesson\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('all',[LessonController::class, 'showLesson']);
Route::get('detail/{lessonId}',[LessonController::class,'showLessonById']);
Route::get('search', [LessonController::class, 'searchLessons']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-lesson', [LessonController::class,'createLesson']);
    Route::put('update-lesson/{lessonId}', [LessonController::class,'updateLesson']);
    Route::put('remove-lesson/{lessonId}', [LessonController::class,'removeLesson']);
    Route::put('course-lesson/{lessonId}', [LessonController::class,'changeLessonCourse']);
});
