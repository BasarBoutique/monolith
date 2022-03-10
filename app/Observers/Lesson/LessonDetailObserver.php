<?php

namespace App\Observers\Lesson;

use App\Enums\LessonLogEnum;
use App\Models\Lesson;
use App\Models\LessonLog;
use Illuminate\Support\Facades\Log;

class LessonDetailObserver
{
    public function updating(Lesson $lesson){
        if ($lesson->isDirty('course_id')) {
            $this->whenCourseChanged($lesson);
        }
        elseif ($lesson->isDirty('is_enabled')) {
            $this->whenRemoveLesson($lesson);
        }
    }

    public function whenCourseChanged(Lesson $lesson){
        $LessonLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_COURSE_CHANGED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New lesson has been created',[
            'context' => $LessonLog->llog_context,
            'author' => $LessonLog->llog_author,
        ]);
    }

    
    public function whenRemoveLesson(Lesson $lesson){
        $LessonLog = LessonLog::create([
            'llog_context' => LessonLogEnum::LESSON_REMOVED,
            'llog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New lesson has been created',[
            'context' => $LessonLog->llog_context,
            'author' => $LessonLog->llog_author,
        ]);
    }
}
