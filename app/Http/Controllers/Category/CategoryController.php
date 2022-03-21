<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DisableCategoryRequest;
use App\Http\Requests\Category\FilterCategotyByIdRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Response\APIResponse;
use App\Repositories\Category\CategoryRepository;
use App\Services\Category\CategoryService;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function showCategories(Request $request)
    {
        try {

            $request->validate([
                'withDisabled' => 'required|string'
            ]);

            $withDisabled = $request->get('withDisabled');

            $service = new CategoryService;

            $categories = $service->showCategories($withDisabled);

            $resource = CategoryResource::collection($categories);

            return APIResponse::success( $resource, 'Retrieve successfully categories');

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

            $resource = CategoryResource::collection($category);

            return APIResponse::success( $resource, 'Retrieve successfully category');

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

            $category = $service->update($validatedRequest);

            $resource = new CategoryResource($category);

            return APIResponse::success($resource,'Successfully updated Category!');
        } catch (Exception $e)
        {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
    public function disableCategory(DisableCategoryRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $category = $service->disableCategory($validatedRequest);

            $resource = new CategoryResource($category);

            return APIResponse::success($resource,'Successfully removed Category!');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
