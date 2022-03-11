<?php

namespace App\Observers\Category;

use App\Enums\CategoryLogEnum;
use App\Models\Category;
use App\Models\CategoryLog;
use Illuminate\Support\Facades\Log;

class CategoryObserver
{
    public function created(Category $category){
        $categoryLog = CategoryLog::create([
            'catlog_context' => CategoryLogEnum::CATEGORY_CREATED,
            'catlog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $categoryLog->catlog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }

    public function updated(Category $category)
    {
        $categoryLog = CategoryLog::create([
            'clog_context' => CategoryLogEnum::CATEGORY_UPDATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Comment has been updated', [
            'context' => $categoryLog->clog_context,
        ]);
    }
}
