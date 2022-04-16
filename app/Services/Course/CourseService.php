<?php

namespace App\Services\Course;

use App\DTO\Course\CourseDTO;
use App\DTO\ImageDTO;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseSearchRepository;
use App\Services\Image\ImageService;

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

    public function showAllCourses(array $queryParams)
    {
        $courses =  $this->courseRepository->showAllCourses($queryParams['withDisabled']);

        return $this->courseRepository->paginateAll($courses, $queryParams['limit']);
    }

    public function showCourseById(array $attributes){
        $course = $this->courseRepository->showCourseById($attributes);

        return $course;
    }

    public function createCourse(array $attributes)
    {
        $courseDTO = new CourseDTO;
        $courseRepository = new CourseRepository;

        $imageDTO = new ImageDTO;

        $imageAttr = [
            'file' => $attributes['file'],
            'id' => null,
            'folder' => 'course'
        ];

        $imageService = new ImageService(app('firebase.storage'));

        $uploadImage = $imageService->uploadImage($imageDTO, $imageAttr);

        $attributes['photo'] = $uploadImage['name'];

        $course = $courseRepository->createCourse($courseDTO, $attributes);

        return $course;

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
