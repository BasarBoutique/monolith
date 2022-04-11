<?php

namespace App\Repositories\Course;

use App\DTO\Interfaces\DTOInterface;
use App\Models\CourseDetail;
use App\Models\Courses;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseRepository {

    public function showAllCourses($withDisabled)
    {
        if($withDisabled) {
            return Courses::withDisabledCourses();
        }

        return (new Courses);
    }

    public function paginateAll($courses, $limit = 15)
    {
        return $courses->paginate($limit);
    }

    public function showCourseById(array $attributes){
        try{
            $course = Courses::has("detail")->where('course_id','=',$attributes['courseId'])->get();
            return $course;
        }
        catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
        }
    }

    public function createCourse(DTOInterface $dto, array $attributes)
    {
        $courseDTO = $dto::make($attributes);

        $course = Courses::create($courseDTO);

        $courseDTO = $dto::append($courseDTO, 'category', 'course_id', $course->course_id);

        $course->detail()->create($courseDTO['detail']);

        $course->category()->create($courseDTO['category']);

        $course->refresh();

        $course->load('detail');

        return $course;
    }

    public function updateCourse(int $courseId, DTOInterface $dto, array $attributes)
    {
        $courseDTO = $dto::make($attributes);

        $course = Courses::findOrFail($courseId);

        $course->update($courseDTO);
        $course->detail()->update($courseDTO['detail']);

        return $course;
    }

    public function changeCourseTeacher(int $courseId, int $teacherId)
    {
        $courseDetail = CourseDetail::findOrFail($courseId);

        $courseDetail->teacher()->associate($teacherId);
        $courseDetail->save();

        return $courseDetail;
    }

    public function disableCourse(array $attributes){
        try{
            $course = Courses::WithDisabledCourses()->findOrFail($attributes['courseId']);

            $course->update(['is_enabled' => !$course->is_enabled]);

            return $course;
        } catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;
        }
    }

}
