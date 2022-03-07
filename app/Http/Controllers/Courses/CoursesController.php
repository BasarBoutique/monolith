<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Response\APIResponse;
use App\Services\Course\CourseService;
use Exception;

class CoursesController extends Controller
{
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
}
