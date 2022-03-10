<?php

namespace App\Observers\Category;

use App\Enums\CategoryLogEnum;
use App\Models\Category;
use App\Models\CategoryLog;
use Illuminate\Support\Facades\Log;

class CategoryObserver
{
    public function updating(Category $category){
        if ($category->isDirty('is_enabled')) {
            $this->whenRemoveCategory($category);
        }
    }

    public function whenRemoveCategory(Category $category){
        $categoryLog = CategoryLog::create([
            'catlog_context' => CategoryLogEnum::CATEGORY_CREATED,
            'catlog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $categoryLog->catlog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }

    public function created(){
        $categoryLog = CategoryLog::create([
            'catlog_context' => CategoryLogEnum::CATEGORY_CREATED,
            'catlog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $categoryLog->catlog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }

    public function updated()
    {
        $categoryLog = CategoryLog::create([
            'catlog_context' => CategoryLogEnum::CATEGORY_UPDATED,
            'catlog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Category has been updated', [
            'context' => $categoryLog->clog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }
}
