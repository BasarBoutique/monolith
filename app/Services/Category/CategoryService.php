<?php

namespace App\Services\Category;

use App\DTO\CategoryDTO;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;

class CategoryService{

    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;
    }

    public function showCategoryById(array $attributes)
    {

        $category = $this->categoryRepository->showCategoryById($attributes);

        return $category;
    }

    public function showCategories(bool $withDisabled = false)
    {
        $categories = $withDisabled
            ? $this->categoryRepository->showAllWithCategoriesDisabled()
            : $this->categoryRepository->showAllCategories();

        return $categories;
    }

    public function create(array $attributes)
    {
        $categoryDTO = new CategoryDTO;

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
