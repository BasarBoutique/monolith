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

    public function create(array $attributes)
    {
        $categoryDTO = new CategoryDTO;
        
        $category = $this->categoryRepository->createCategory($categoryDTO, $attributes);
        
        return $category;
    }

    public function update(array $attributes,int $cate)
    {
        $categoryDTO = new CategoryDTO;

        $category = $this->categoryRepository->editCategory($categoryDTO,$cate,$attributes);

        return $category;
    }

    public function remove(int $cate)
    {
        $category = $this->categoryRepository->disableCategory($cate);
        
        return $category;
    }
}