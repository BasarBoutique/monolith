<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\ChangeTeacherRequest;
use App\Http\Requests\Course\DisableCourseRequest;
use App\Http\Requests\Course\FilterCourseByIdRequest;
use App\Http\Requests\Course\SearchCourseRequest;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Resources\Course\CoursePaginate;
use App\Http\Resources\Course\CourseResource;
use App\Http\Resources\Course\CourseSearchResource;
use App\Http\Response\APIResponse;
use App\Services\Course\CourseService;
use Exception;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function showCourse(Request $request){
        try {

            $request->validate([
                'withDisabled' => 'required|in:true,false',
                'limit' => 'numeric'
            ]);

            $queryParams = [
                'withDisabled' => filter_var($request->get('withDisabled'), FILTER_VALIDATE_BOOLEAN),
                'limit' => optional($request)->limit ?? 15
            ];

            $service = new CourseService;

            $courses = $service->showAllCourses($queryParams);

            $resource = new CoursePaginate($courses);

            return APIResponse::success($resource, 'Retrieve successfully courses');

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function searchCourses(SearchCourseRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $service = new CourseService;

            $courses = $service->searchCourses($validatedRequest);

            $resource = new CourseSearchResource($courses);

            return APIResponse::success($resource, 'Retrieve successfully filtered courses');

        } catch(Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function showCourseById(FilterCourseByIdRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $service = new CourseService;

            $course = $service->showCourseById($validatedRequest);

            $resource = CourseResource::collection($course);

            return APIResponse::success($resource,'Retrieve successfully course');
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

            $resource = new CourseResource($course);

            return APIResponse::success($resource, "Course created successfully");

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

            $resource = new CourseResource($course);

            return APIResponse::success($resource, 'Course updated successfully');

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

            $resource = new CourseResource($course);

            return APIResponse::success($resource, 'Teacher changed successfully');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage());
        }
    }

    public  function disableCourse(DisableCourseRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CourseService;

            $course = $service->disableCourse($validatedRequest);

            $resource = new CourseResource($course);

            return APIResponse::success($resource,'Successfully removed Course!');
        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
