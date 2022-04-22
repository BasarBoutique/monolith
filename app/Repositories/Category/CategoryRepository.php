<?php

namespace App\Repositories\Category;

use App\DTO\Interfaces\DTOInterface;
use App\Events\CategoryRegistered;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryRepository{

    public function showAllCategories(int $perPage)
    {
        return Category::paginate($perPage);
    }

    public function showAllWithCategoriesDisabled(int $perPage)
    {

        return Category::withDisabledCategories()->paginate($perPage);
    }

    public function showCategoryById(int $categoryId)
    {
        try {
            $category = Category::findOrFail($categoryId);

            return $category;

        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function createCategory(DTOInterface $dto, array $attributes)
    {
        try {
            $cartegoryDTO = $dto::make($attributes);

            $category = Category::create($cartegoryDTO);

            return $category;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function editCategory(DTOInterface $dto,array $attributes)
    {
        try{
            $categoryDTO = $dto::make($attributes);

            $category = Category::withDisabledCategories()->findOrFail($attributes['categoryId']);

            $category->update($categoryDTO);

            return $category;
        }catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
        }

    }

    public function disableCategory(array $attributes)
    {
       try {
            $category = Category::withDisabledCategories()->findOrFail($attributes['categoryId']);

            $category->update(['is_enabled' => !$category->is_enabled]);

            return $category;
       } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
       }
    }

}
