<?php
    
namespace App\Services\Lesson;

use App\DTO\Lesson\LessonDTO;
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
        
        return $lesson;
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