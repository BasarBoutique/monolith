<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\DisableCategoryRequest;
use App\Http\Requests\Category\FilterCategoryRequest;
use App\Http\Requests\Category\SearchCategoriesRequest;
use App\Http\Requests\Category\ShowCategoriesRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryPaginateResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategorySearchResource;
use App\Http\Resources\Category\CategorySlideResource;
use App\Http\Response\APIResponse;
use App\Models\Category;
use App\Services\Category\CategoryService;
use Exception;

class CategoryController extends Controller
{
    public function slideCategories() {
        try {
            $service = new CategoryService;

            $categories = $service->slideCategories();

            $resource = CategorySlideResource::collection($categories);

            return APIResponse::success( $resource, 'Retrieve successfully categories');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function showCategories(ShowCategoriesRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $categories = $service->showCategories($validatedRequest);

            $resource = new CategoryPaginateResource($categories);

            return APIResponse::success( $resource, 'Retrieve successfully categories');

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function searchCategories(SearchCategoriesRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $categories = $service->searchCategories($validatedRequest);

            $resource = new CategorySearchResource($categories);

            return APIResponse::success($resource, 'Retrieve succesfully filtered categories');


        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function showCategoryById(FilterCategoryRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $service = new CategoryService;

            $category = $service->showCategoryById($validatedRequest['categoryId']);

            $resource = new CategoryResource($category);

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
