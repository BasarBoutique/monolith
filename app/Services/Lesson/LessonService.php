<?php

namespace App\Services\Lesson;

use App\DTO\Lesson\LessonDTO;
use App\Events\Lesson\LessonRegistered;
use App\Repositories\Lesson\LessonRepository;
use App\Repositories\Lesson\LessonSearchRepository;

class LessonService{

    private $lessonRepository;

    public function __construct()
    {
        $this->lessonRepository = new LessonRepository;
    }

    public function showLesson(bool $withDisabled = false){
        $lesson = $withDisabled
            ? $this->lessonRepository->showAllWithLessonDisabled()
            : $this->lessonRepository->showAllLesson();

        return $lesson->paginate(10);
    }

    public function showLessonById(array $attributes){
        $lesson = $this->lessonRepository->showLessonById($attributes);

        return $lesson;
    }

    public function searchLessons(array $queryParams)
    {

        $repository = new LessonSearchRepository();

        $repository->makeQuery($queryParams['filters']);
        $repository->orderBy($queryParams['order']);

        return $repository->paginateSearch($queryParams['paginate']);

    }

    public function create(array $attributes)
    {
        $lessonDTO = new LessonDTO;

        $lesson = $this->lessonRepository->createLesson($lessonDTO,$attributes);

        event(new LessonRegistered($lesson));

        return $lesson;
    }

    public function update(array $attributes)
    {
        $lessonDTO = new LessonDTO;

        $lesson = $this->lessonRepository->editLesson($lessonDTO,$attributes);

        return $lesson;
    }

    public function remove(array $attributes)
    {
        $lesson = $this->lessonRepository->disableLesson($attributes);

        return $lesson;
    }

    public function changeLessonCourse(array $attributes){
        $lesson = $this->lessonRepository->changeLessonCourse($attributes);

        return $lesson;
    }
}
