<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('category', [CategoryController::class, 'Category']);
Route::get('show-category/{category}', [CategoryController::class, 'showCategory']);
Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-category', [CategoryController::class,'createCategory']);
    Route::put('update-category', [CategoryController::class,'updateCategory']);
    Route::delete('delete-category', [CategoryController::class,'deleteCategory']);
});
