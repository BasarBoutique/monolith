<?php

namespace App\Services\Lesson;

use App\DTO\Lesson\LessonDTO;
use App\Events\Lesson\LessonRegistered;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Lesson\LessonSearchRepository;
use Exception;
use Illuminate\Support\Facades\Log;
class LessonService{

    private $lessonRepository;

    public function __construct()
    {
        $this->lessonRepository = new LessonRepository;
    }

    public function showLesson(bool $withDisabled = false){
        try {
            $lesson = $withDisabled
            ? $this->lessonRepository->showAllWithLessonDisabled()
            : $this->lessonRepository->showAllLesson();

            return $lesson->paginate(10);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function showLessonById(array $attributes){
        try {
            $lesson = $this->lessonRepository->showLessonById($attributes);

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function searchLessons(array $queryParams)
    {
        try {
            $repository = new LessonSearchRepository();

            $repository->makeQuery($queryParams['filters']);
            $repository->orderBy($queryParams['order']);

            return $repository->paginateSearch($queryParams['paginate']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        

    }

    public function create(array $attributes)
    {
        try {
            $lessonDTO = new LessonDTO;

            $lesson = $this->lessonRepository->createLesson($lessonDTO,$attributes);

            event(new LessonRegistered($lesson));

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function update(array $attributes)
    {
        try {
            $lessonDTO = new LessonDTO;

            $lesson = $this->lessonRepository->editLesson($lessonDTO,$attributes);

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function remove(array $attributes)
    {
        try {
            $lesson = $this->lessonRepository->disableLesson($attributes);

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function changeLessonCourse(array $attributes){
        try {
            $lesson = $this->lessonRepository->changeLessonCourse($attributes);

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }
}
