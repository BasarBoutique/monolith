<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DisableCategoryRequest;
use App\Http\Requests\Category\FilterCategotyByIdRequest;
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

    public function showCategoryById(FilterCategotyByIdRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $resource = new CategoryService;

            $category = $resource->showCategoryById($validatedRequest);

            return APIResponse::make(true, $category);

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function createCategory(StoreCategoryRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CategoryService;
            
            $category = $service->create($validatedRequest);
            
            return APIResponse::success($category->toArray(),'Successfully created Category!');
        } 
        catch (Exception $e) 
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function updateCategory(UpdateCategoryRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $service->update($validatedRequest);

            return APIResponse::success([],'Successfully updated Category!');
        } catch (Exception $e) 
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
    public function deleteCategory(DisableCategoryRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $service->remove($validatedRequest);
            
            return APIResponse::success([],'Successfully removed Category!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
