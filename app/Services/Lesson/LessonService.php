<?php
    
namespace App\Services\Lesson;

use App\DTO\Lesson\LessonDTO;
use App\Events\Lesson\LessonRegistered;
use App\Models\LessonDetial;
use App\Repositories\Lesson\LessonRepository;

class LessonService{
    
    private $lessonRepository;

    public function __construct()
    {
        $this->lessonRepository = new LessonRepository;
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
}