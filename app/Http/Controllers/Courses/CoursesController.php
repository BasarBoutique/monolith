<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\ChangeTeacherRequest;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Resources\Course\CourseResource;
use App\Http\Response\APIResponse;
use App\Services\Course\CourseService;
use Exception;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function showCourse(Request $request){
        try {

            $request->validate([
                'withDisabled' => 'required|boolean'
            ]);

            $withDisabled = $request->get('withDisabled');

            $service = new CourseService;

            $courses = $service->showCourse($withDisabled);

            $resource = CourseResource::collection($courses);

            return APIResponse::success( $resource, 'Retrieve successfully categories');

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function createCourse(StoreCourseRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $service = new CourseService;

            $course = $service->createCourse($validatedRequest);

            return APIResponse::success($course->toArray(), "Course created successfully");

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage());
        }
    }

    public function updateCourse(UpdateCourseRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $service = new CourseService;

            $course = $service->updateCourse($validatedRequest);

            return APIResponse::success($course->toArray(), 'Course updated successfully');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage());
        }
    }

    public function changeCourseTeacher(ChangeTeacherRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $service = new CourseService;

            $course = $service->changeCourseTeacher($validatedRequest);

            return APIResponse::success($course->toArray(), 'Teacher changed successfully');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage());
        }
    }
}
