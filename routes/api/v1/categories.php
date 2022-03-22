<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('all', [CategoryController::class, 'showCategories']);
Route::get('detail/{categoryId}', [CategoryController::class,'showCategoryById']);
Route::get('category', [CategoryController::class,'slideCategories']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-category', [CategoryController::class,'createCategory']);
    Route::put('update-category/{categoryId}', [CategoryController::class,'updateCategory']);
    Route::put('disable-category/{categoryId}', [CategoryController::class,'disableCategory']);
});
