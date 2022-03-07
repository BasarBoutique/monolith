<?php

namespace App\Services\Course;

use App\DTO\Course\CourseDTO;
use App\Repositories\Course\CourseRepository;

class CourseService{

    public function createCourse(array $attributes)
    {
        $courseDTO = new CourseDTO;

        $courseRepository = new CourseRepository;

        return $courseRepository->createCourse($courseDTO, $attributes);

    }

    public function update(array $attributes)
    {
        /** */
    }

    public function remove()
    {
        /** */
    }
}
