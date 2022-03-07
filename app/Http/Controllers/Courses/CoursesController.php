<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Services\Course\CourseService;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function createCourse(StoreCourseRequest $request)
    {
        $validatedRequest = $request->validated();

        $service = new CourseService;

        $course = $service->createCourse($validatedRequest);

        return $course;
    }
}
