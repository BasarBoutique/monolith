<?php

namespace App\Observers\Lesson;

use App\Enums\LessonLogEnum;
use App\Models\Lesson;
use App\Models\LessonDetial;
use App\Models\LessonLog;
use Illuminate\Support\Facades\Log;


class LessonObserver
{
    public function created(Lesson $lesson){
        $LessonLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_CREATED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New category has been created',[
            'context' => $LessonLog->catlog_context,
            'author' => $LessonLog->catlog_author,
        ]);
    }

    public function updated(Lesson $lesson)
    {
        $LessonLog = LessonLog::create([
            'clog_context' => LessonLogEnum::LESSON_UPDATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Comment has been updated', [
            'context' => $LessonLog->clog_context,
        ]);
    }
}
