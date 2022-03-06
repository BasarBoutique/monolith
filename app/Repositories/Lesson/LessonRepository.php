<?php
    
namespace App\Repositories\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;
use App\Models\LessonDetial;

class LessonRepository{

    public function Lesson(){
        $lesson = Lesson::all()->where('is_enabled',true);
        return compact('lesson');
    }
    
    public function showLesson(int $les)
    {
        $lesson = Lesson::where('is_enabled',true)->findOrFail($les);

        return compact('lesson');
    }

    public function createLesson(DTOInterface $dto,array $attributes)
    {
        $lessonDTO = $dto::make($attributes);

        $lesson = Lesson::create($lessonDTO);

        $lesson->detail()->create($lessonDTO['details']);

        return $lesson;
    }

    public function editLesson()
    {
        //set model name in here, this is necessary!
    }
        
    public function disableLesson()
    {
        //set model name in here, this is necessary!
    }

}