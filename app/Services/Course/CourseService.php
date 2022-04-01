<?php

namespace App\Services\Course;

use App\DTO\Course\CourseDTO;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseSearchRepository;

class CourseService{
    private $courseRepository;

    public function __construct()
    {
        $this->courseRepository = new CourseRepository;
    }

    public function searchCourses(array $queryParams)
    {
        $searchRepository = new CourseSearchRepository;

        $searchRepository->makeQuery($queryParams['filters']);
        $searchRepository->orderBy($queryParams['order']);

        return $searchRepository->paginateSearch($queryParams['paginate']);
    }

    public function showAllCourses(bool $withDisabled = false){
        $courses = $withDisabled
            ? $this->courseRepository->showAllCourses()
            : $this->courseRepository->showAllWithCoursesDisabled();

        return $courses;
    }

    public function showCourseById(array $attributes){
        $course = $this->courseRepository->showCourseById($attributes);

        return $course;
    }

    public function createCourse(array $attributes)
    {
        $courseDTO = new CourseDTO;

        $courseRepository = new CourseRepository;

        return $courseRepository->createCourse($courseDTO, $attributes);

    }

    public function updateCourse(array $attributes)
    {
        $courseDTO = new CourseDTO;

        $courseRepository = new CourseRepository;

        return $courseRepository->updateCourse($attributes['courseId'], $courseDTO, $attributes);
    }

    public function changeCourseTeacher(array $attributes)
    {
        $courseRepository = new CourseRepository;

        return $courseRepository->changeCourseTeacher($attributes['courseId'], $attributes['teacher_id']);
    }

    public function disableCourse(array $attributes){
        $course = $this->courseRepository->disableCourse($attributes);

        return $course;
    }
}
