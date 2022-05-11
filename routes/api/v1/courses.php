<?php

use App\Http\Controllers\Courses\CoursesController;
use Illuminate\Support\Facades\Route;

Route::get('all', [CoursesController::class, 'showCourse']);
Route::post('search', [CoursesController::class, 'searchCourses']);
Route::get('detail/{courseId}', [CoursesController::class, 'showCourseById']);

Route::post('attachUser', [CoursesController::class, 'attachUserToCourse']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', [CoursesController::class, 'showCoursesUser']);
});

Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-course', [CoursesController::class, 'createCourse']);
    Route::put('update-course/{courseId}', [CoursesController::class, 'updateCourse']);
    Route::put('change-teacher/{courseId}', [CoursesController::class, 'changeCourseTeacher']);
    Route::put('disable-course/{courseId}', [CoursesController::class,'disableCourse']);
});

