<?php

use App\Http\Controllers\Courses\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get('all', [CoursesController::class, 'showCourse']);
Route::get('detail/{courseId}', [CoursesController::class, 'showCourseById']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-course', [CoursesController::class, 'createCourse']);
    Route::put('update-course/{courseId}', [CoursesController::class, 'updateCourse']);
    Route::put('change-teacher/{courseId}', [CoursesController::class, 'changeCourseTeacher']);
    Route::put('disable-course/{courseId}', [CoursesController::class,'disableCourse']);
});

