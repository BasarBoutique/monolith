<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('category', [CategoryController::class, 'Category']);
Route::get('categoryById/{categoryId}', [CategoryController::class,'showCategoryById']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-category', [CategoryController::class,'createCategory']);
    Route::put('update-category/{categoryId}', [CategoryController::class,'updateCategory']);
    Route::put('delete-category/{categoryId}', [CategoryController::class,'deleteCategory']);
});
