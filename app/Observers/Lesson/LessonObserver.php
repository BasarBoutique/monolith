<?php

namespace App\Observers\Lesson;

use App\Enums\LessonLogEnum;
use App\Models\LessonDetial;
use App\Models\LessonLog;
use Illuminate\Support\Facades\Log;


class LessonObserver
{
    public function created(){
        $categoryLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_CREATED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $categoryLog->catlog_context,
            'author' => $categoryLog->catlog_author,
        ]);
    }
}
