<?php

namespace App\Observers\Course;

use App\Enums\CourseLogEnum;
use App\Models\CourseDetail;
use App\Models\CourseLog;
use Illuminate\Support\Facades\Log;

class CourseDetailObserver
{

    /**
     * Handle the CourseDetail "updated" event.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return void
     */
    public function updating(CourseDetail $courseDetail)
    {
        if($courseDetail->isDirty('cdetail_author')) {
            $this->whenTeacherChanged($courseDetail);
        }
    }

    private function whenTeacherChanged(CourseDetail $courseDetail)
    {
        $courseLog = CourseLog::create([
            'clog_context' => CourseLogEnum::TEACHER_COURSE_CHANGED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New course has been created', [
            'context' => $courseLog->clog_context,
            'author' => $courseLog->clog_author,
            'details' => [
                'teacher' => $courseDetail->cdetail_author
            ]
        ]);
    }

    /**
     * Handle the CourseDetail "deleted" event.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return void
     */
    public function deleted(CourseDetail $courseDetail)
    {
        //
    }

    /**
     * Handle the CourseDetail "restored" event.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return void
     */
    public function restored(CourseDetail $courseDetail)
    {
        //
    }

    /**
     * Handle the CourseDetail "force deleted" event.
     *
     * @param  \App\Models\CourseDetail  $courseDetail
     * @return void
     */
    public function forceDeleted(CourseDetail $courseDetail)
    {
        //
    }
}
