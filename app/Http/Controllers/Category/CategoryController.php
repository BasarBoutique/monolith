<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Category\CategoryRepository;
use App\Services\Category\CategoryService;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory()
    {
        try {
            $resource = new CategoryRepository;
            $category = $resource->showCategory();
            return APIResponse::make(true, $category);
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
    public function createCategory(StoreCategoryRequest $request){
        try {
            $attributes = $request->validated();

            $service = new CategoryService;
            
            $service->create($attributes);
            return APIResponse::success([],'Successfully created role!');
        } 
        catch (Exception $e) 
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
