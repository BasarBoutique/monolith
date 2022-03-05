<?php
    
namespace App\Repositories\Category;

use App\DTO\Interfaces\DTOInterface;
use App\Events\CategoryRegistered;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryRepository{
    
    public function showCategory()
    {
        $category = Category::all()->where('is_enabled',true);
        return compact('category');
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
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
            
            return false;
        }
    }

    public function editCategory(int $cate,array $attributes)
    {
        
    }
        
    public function disableCategory(int $cate)
    {
       
    }

}