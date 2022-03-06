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
            'catlog_context' => CategoryLogEnum::ROLE_CREATED,
            'catlog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $categoryLog->catlog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }
}
