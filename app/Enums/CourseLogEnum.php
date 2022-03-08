<?php

namespace App\Enums;

enum CourseLogEnum : string {

    const COURSE_CREATED = 'COURSE_CREATED';
    const COURSE_UPDATED = 'COURSE_UPDATED';
    const TEACHER_COURSE_CHANGED = 'TEACHER_COURSE_CHANGED';
    const DISABLED_COURSE = 'DISABLED_COURSE';
}
