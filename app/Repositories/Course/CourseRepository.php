<?php

namespace App\Repositories\Course;

use App\DTO\Interfaces\DTOInterface;
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

    public function disableCourse(int $id)
    {
        //set model name in here, this is necessary!
    }

}
