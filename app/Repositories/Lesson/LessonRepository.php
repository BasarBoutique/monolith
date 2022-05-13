<?php

namespace App\Repositories\Lesson;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Lesson;
use App\Models\LessonDetail;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LessonRepository{

    public function showAllWithLessonDisabled()
    {
        try {
            return Lesson::withDisabledLesson();
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function showAllLesson()
    {
        try {
            return Lesson::has("detail");
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function showLessonsByCourse(array $attributes)
    {
        try {

            $lessons = Lesson::whereHas('course', function ($q) use ($attributes) {

                $q->where('course_id', $attributes['course']);

            })->get()->load('detail');

            return $lessons;

        } catch (Exception $e) {

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;

        }
    }

    public function showLessonById(array $attributes)
    {
        try{
            $lesson = Lesson::with("detail")->find($attributes['lessonId']);
            return $lesson;
        }
        catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }

    }

    public function createLesson(DTOInterface $dto,array $attributes)
    {
        try {
            return DB::transaction(function () use ($attributes, $dto) {

                $lessonDTO = $dto::make($attributes);

                $lessonDetail = LessonDetail::create($lessonDTO['detail']);

                $lesson = Lesson::create([
                    'course_id' => $lessonDTO['course_id'],
                    'ld_id' => $lessonDetail->ld_id
                ]);

                return $lesson;
            });
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

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
                'TRACE' => $e->getTrace()
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
                'TRACE' => $e->getTrace()
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
                'TRACE' =>$e->getTrace()
            ]);
            throw $e;

            return false;
        }
    }

}
