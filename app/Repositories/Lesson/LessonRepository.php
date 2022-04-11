<?php

namespace App\Repositories\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;
use App\Models\LessonDetail;
use Exception;
use Illuminate\Support\Facades\Log;

class LessonRepository{

    public function showAllWithLessonDisabled()
    {
        return Lesson::withDisabledLesson();
    }

    public function showAllLesson()
    {
        return Lesson::has("detail");
    }

    public function showLessonById(array $attributes)
    {
        try{
            $lesson = Lesson::has("detail")->where('lesson.ld_id', '=', $attributes['lessonId'])->get();
            return $lesson;
        }
        catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
        }

    }

    public function createLesson(DTOInterface $dto,array $attributes)
    {
        $lessonDTO = $dto::make($attributes);

        $lesson = LessonDetail::create($lessonDTO);

        $lesson->detail()->create($lessonDTO['course_id']);

        return $lesson;
    }

    public function editLesson(DTOInterface $dto,array $attributes)
    {
        try {
            $lessonDTO = $dto::make($attributes);

            $lesson = LessonDetail::findOrFail($attributes['lessonId']);

            $lesson->update($lessonDTO);

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
            $lesson = Lesson::findOrFail($attributes['lessonId'])->update(['is_enabled' => false]);
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

    public function changeLessonCourse(array $attributes){

        try {

            $lessonDetail = Lesson::findOrFail($attributes['lessonId']);

            $lessonDetail->update(['course_id' => $attributes['course_id']]);

            return $lessonDetail;

        } catch (Exception $e) {

            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' =>$e->getTraceAsString()
            ]);
            throw $e;

            return false;
        }
    }

}
