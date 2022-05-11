<?php

namespace App\Repositories\Course;

use App\DTO\Interfaces\DTOInterface;
use App\Models\CourseDetail;
use App\Models\Courses;
use App\Models\CourseUser;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseRepository {

    public function showAllCourses($withDisabled)
    {
        try {
            $courses = new Courses;
            $courses->with(['category']);

            if($withDisabled) {
                return $courses::withDisabledCourses();
            }

            return $courses;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function paginateAll($courses, $limit = 15)
    {
        try {
            return $courses->paginate($limit);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function showCourseById(array $attributes){
        try{
            $course = Courses::with(['detail', 'category'])->findOrFail($attributes['courseId']);

            return $course;
        }
        catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function createCourse(DTOInterface $dto, array $attributes)
    {
        try {
            $courseDTO = $dto::make($attributes);

            $course = Courses::create($courseDTO);

            $courseDTO = $dto::append($courseDTO, 'category', 'course_id', $course->course_id);

            $course->detail()->create($courseDTO['detail']);

            $course->category()->create($courseDTO['category']);

            $course->refresh();

            $course->load(['detail', 'category']);

            return $course;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function updateCourse(int $courseId, DTOInterface $dto, array $attributes)
    {
        try {
            $courseDTO = $dto::make($attributes);

            $course = Courses::findOrFail($courseId);

            $course->update($courseDTO);
            $course->detail()->update($courseDTO['detail']);

            return $course;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function changeCourseTeacher(int $courseId, int $teacherId)
    {
        try {
            $courseDetail = CourseDetail::findOrFail($courseId);

            $courseDetail->teacher()->associate($teacherId);
            $courseDetail->save();

            return $courseDetail;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function disableCourse(array $attributes){
        try{
            $course = Courses::WithDisabledCourses()->findOrFail($attributes['courseId']);

            $course->update(['is_enabled' => !$course->is_enabled]);

            return $course;
        } catch(Exception $e){
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function attachUser(array $attributes)
    {
        try {

            return DB::transaction(function () use ($attributes) {

                return CourseUser::create([
                    'course_id' => $attributes['course_id'],
                    'user_id' => $attributes['user_id']
                ]);

            });


        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function showCoursesUser($user)
    {
        try {

            $user_id = $user->user_id;

            $user = User::find($user_id);

            return $user->purcharsedCourses;

        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

}
