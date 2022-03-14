<?php

namespace App\Enums;

enum LessonLogEnum : string {
    const LESSON_CREATED = 'LESSON_CREATED';
    const LESSON_UPDATED = 'LESSON_UPDATED';
    const LESSON_REMOVED = 'LESSON_REMOVED';
    const LESSON_COURSE_CHANGED = 'LESSON_COURSE_CHANGED';
}