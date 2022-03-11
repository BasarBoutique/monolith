<?php

namespace App\Observers\Course;

use App\Enums\CourseLogEnum;
use App\Models\CourseLog;
use App\Models\Courses;
use Illuminate\Support\Facades\Log;

class CourseObserver
{
    /**
     * Handle the Courses "created" event.
     *
     * @param  \App\Models\Courses  $courses
     * @return void
     */
    public function created(Courses $course)
    {
        $courseLog = CourseLog::create([
            'clog_context' => CourseLogEnum::COURSE_CREATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New course has been created', [
            'context' => $courseLog->clog_context,
            'author' => $courseLog->clog_author,
            'details' => [
                'course' => $course->course_title
            ]
        ]);
    }

    /**
     * Handle the Courses "updated" event.
     *
     * @param  \App\Models\Courses  $courses
     * @return void
     */
    public function updated(Courses $course)
    {
        $courseLog = CourseLog::create([
            'clog_context' => CourseLogEnum::COURSE_UPDATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Course has been updated', [
            'context' => $courseLog->clog_context,
            'details' => [
                'course' => $course->course_title
            ]
        ]);
    }

    /**
     * Handle the Courses "deleted" event.
     *
     * @param  \App\Models\Courses  $courses
     * @return void
     */
    public function deleted(Courses $courses)
    {
        //
    }

    /**
     * Handle the Courses "restored" event.
     *
     * @param  \App\Models\Courses  $courses
     * @return void
     */
    public function restored(Courses $courses)
    {
        //
    }

    /**
     * Handle the Courses "force deleted" event.
     *
     * @param  \App\Models\Courses  $courses
     * @return void
     */
    public function forceDeleted(Courses $courses)
    {
        //
    }
}
