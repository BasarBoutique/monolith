<?php

namespace App\Services\Course;

use App\DTO\Course\CourseDTO;
use App\DTO\ImageDTO;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseSearchRepository;
use App\Services\Image\ImageService;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseService{
    private $courseRepository;

    public function __construct()
    {
        $this->courseRepository = new CourseRepository;
    }

    public function searchCourses(array $queryParams)
    {
        try {
            $searchRepository = new CourseSearchRepository;

            $searchRepository->makeQuery($queryParams['filters']);
            $searchRepository->orderBy($queryParams['order']);

            return $searchRepository->paginateSearch($queryParams['paginate']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function showAllCourses(array $queryParams)
    {
        try {
            $courses =  $this->courseRepository->showAllCourses($queryParams['withDisabled']);

            return $this->courseRepository->paginateAll($courses, $queryParams['limit']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function showCourseById(array $attributes){
        try {
            $course = $this->courseRepository->showCourseById($attributes);

            return $course;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function createCourse(array $attributes)
    {
        try {
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
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }


    }

    public function updateCourse(array $attributes)
    {
        try {
            $courseDTO = new CourseDTO;

            $courseRepository = new CourseRepository;

            return $courseRepository->updateCourse($attributes['courseId'], $courseDTO, $attributes);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function changeCourseTeacher(array $attributes)
    {
        try {
            $courseRepository = new CourseRepository;

            return $courseRepository->changeCourseTeacher($attributes['courseId'], $attributes['teacher_id']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function disableCourse(array $attributes){
        try {
            $course = $this->courseRepository->disableCourse($attributes);

            return $course;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function attachUserCourse(array $attributes)
    {
        try {

            $course = $this->courseRepository->attachUser($attributes);

            return $course;



        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
    }

    public function showCoursesUser($user)
    {
        try {
            
            $courses = $this->courseRepository->showCoursesUser($user);

            return $courses;

        }  catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
    }
}
