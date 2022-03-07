<?php

namespace App\Repositories\Course;

use App\DTO\Interfaces\DTOInterface;
use App\Models\CourseDetail;
use App\Models\Courses;

class CourseRepository {

    public function createCourse(DTOInterface $dto, array $attributes)
    {
        $courseDTO = $dto::make($attributes);

        $course = Courses::create($courseDTO);

        $course->detail()->create($courseDTO['detail']);

        return $course;
    }

    public function updateCourse(int $courseId, DTOInterface $dto, array $attributes)
    {
        $courseDTO = $dto::make($attributes);

        $course = Courses::findOrFail($courseId);

        $course->update($courseDTO);
        $course->detail()->update($courseDTO['detail']);

        return $course;
    }

    public function changeCourseTeacher(int $courseId, int $teacherId)
    {
        $courseDetail = CourseDetail::where('course_id', $courseId);

        $courseDetail->update([
            'cdetail_author' => $teacherId
        ]);

        return $courseDetail;
    }

}
