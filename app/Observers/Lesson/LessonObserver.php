<?php

namespace App\Observers\Lesson;

use App\Enums\LessonLogEnum;
use App\Models\Lesson;
use App\Models\LessonDetial;
use App\Models\LessonLog;
use Illuminate\Support\Facades\Log;


class LessonObserver
{
    public function created(){
        $LessonLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_CREATED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New lesson has been created',[
            'context' => $LessonLog->llog_context,
            'author' => $LessonLog->llog_author,
        ]);
    }

    public function updated()
    {
        $LessonLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_UPDATED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Comment has been updated', [
            'context' => $LessonLog->llog_context,
        ]);
    }
}
