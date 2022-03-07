<?php
    
namespace App\Repositories\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;
use App\Models\LessonDetial;
use Exception;
use Illuminate\Support\Facades\Log;

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

        $lesson = LessonDetial::create($lessonDTO);

        $lesson->detail()->create($lessonDTO['lesson']);

        return $lesson;
    }

    public function editLesson(DTOInterface $dto,array $attributes)
    {
        try {
            $lessonDTO = $dto::make($attributes);

            $lesson = LessonDetial::findOrFail($attributes['ld_id'])->update($lessonDTO);
            
            $lesson->detail()->update($lessonDTO['lesson']);
            
            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
            
            return false;
        }
    }
        
    public function disableLesson(array $attributes)
    {
        try {
            $lesson = Lesson::findOrFail($attributes['lesson_id'])->update(['is_enabled' => false]);
            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
            
            return false;
        }
    }

}