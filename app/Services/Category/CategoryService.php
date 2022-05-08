<?php

namespace App\Services\Category;

use App\DTO\CategoryDTO;
use App\DTO\ImageDTO;
use App\Http\Resources\Category\CategorySearchResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategorySearchRepository;
use App\Services\Image\ImageService;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryService{

    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
    }

    public function slideCategories() {
        try {
            $category = $this->categoryRepository->showAllCategories(Category::SLIDE_PER_PAGE);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }


    }

    public function showCategoryById(int $categoryId)
    {
        try {
            $category = $this->categoryRepository->showCategoryById($categoryId);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }


    }

    public function searchCategories(array $queryParams)
    {
        try {
            $repository = new CategorySearchRepository;

            $repository->makeQuery($queryParams['filters']);
            $repository->orderBy($queryParams['order']);

            return $repository->paginateSearch($queryParams['paginate']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }



    }

    public function showCategories(array $args)
    {
        try {
            $categories = $args['withDisabled']
            ? $this->categoryRepository->showAllWithCategoriesDisabled($args['perPage'])
            : $this->categoryRepository->showAllCategories($args['perPage']);

            return $categories;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function create(array $attributes)
    {
        try {
            $imageDTO = new ImageDTO;

            $imageAttr = [
                'file' => $attributes['file'],
                'id' => null,
                'folder' => 'category'
            ];

            $imageService = new ImageService(app('firebase.storage'));

            $uploadImage = $imageService->uploadImage($imageDTO, $imageAttr);

            $categoryDTO = new CategoryDTO;

            $attributes['image'] = $uploadImage['name'];

            $category = $this->categoryRepository->createCategory($categoryDTO, $attributes);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }


    }

    public function update(array $attributes)
    {
        try {
            $imageDTO = new ImageDTO;

            $imageAttr = [
                'file' => $attributes['file'],
                'id' => $attributes['categoryId'],
                'folder' => 'category'
            ];

            $imageService = new ImageService(app('firebase.storage'));

            $uploadImage = $imageService->uploadImage($imageDTO, $imageAttr);

            $categoryDTO = new CategoryDTO;
            
            $attributes['image'] = $uploadImage['name'];

            $category = $this->categoryRepository->editCategory($categoryDTO,$attributes);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function disableCategory(array $attributes)
    {
        try {
            $category = $this->categoryRepository->disableCategory($attributes);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }


}
