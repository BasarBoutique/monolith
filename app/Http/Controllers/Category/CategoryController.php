<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Category\CategoryRepository;
use App\Services\Category\CategoryService;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function Category()
    {
        try {
            $resource = new CategoryRepository;

            $category = $resource->Category();

            return APIResponse::make(true, $category);

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function showCategory($cate)
    {
        try {
            $resource = new CategoryRepository;

            $category = $resource->showCategory($cate);

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
            
            return APIResponse::success([],'Successfully created Category!');
        } 
        catch (Exception $e) 
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function updateCategory(UpdateCategoryRequest $request, $category){
        try {
            $attributes = $request->validated();

            $service = new CategoryService;

            $service->update($attributes,$category);

            return APIResponse::success([],'Successfully updated Category!');
        } catch (Exception $e) 
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
    public function deleteCategory($category){
        try {
            $service = new CategoryService;

            $service->remove($category);
            
            return APIResponse::success([],'Successfully removed Category!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
