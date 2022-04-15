<?php

namespace App\Services\Category;

use App\DTO\CategoryDTO;
use App\DTO\ImageDTO;
use App\Http\Resources\Category\CategorySearchResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategorySearchRepository;
use App\Services\Image\ImageService;

class CategoryService{

    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
    }

    public function slideCategories() {

        $category = $this->categoryRepository->showAllCategories(Category::SLIDE_PER_PAGE);

        return $category;
    }

    public function showCategoryById(int $categoryId)
    {

        $category = $this->categoryRepository->showCategoryById($categoryId);

        return $category;
    }

    public function searchCategories(array $queryParams)
    {

        $repository = new CategorySearchRepository;

        $repository->makeQuery($queryParams['filters']);
        $repository->orderBy($queryParams['order']);

        return $repository->paginateSearch($queryParams['paginate']);

    }

    public function showCategories(array $args)
    {
        $categories = $args['withDisabled']
            ? $this->categoryRepository->showAllWithCategoriesDisabled($args['perPage'])
            : $this->categoryRepository->showAllCategories($args['perPage']);

        return $categories;
    }

    public function create(array $attributes)
    {
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

    }

    public function update(array $attributes)
    {
        $categoryDTO = new CategoryDTO;

        $category = $this->categoryRepository->editCategory($categoryDTO,$attributes);

        return $category;
    }

    public function disableCategory(array $attributes)
    {
        $category = $this->categoryRepository->disableCategory($attributes);

        return $category;
    }


}
