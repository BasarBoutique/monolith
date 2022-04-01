<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\ChangeCourseRequest;
use App\Http\Requests\Lesson\DisableLeassonRequest;
use App\Http\Requests\Lesson\FilterLessonByIdRequest;
use App\Http\Requests\Lesson\StoreLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;
use App\Http\Resources\Lesson\LessonResource;
use App\Http\Resources\Lesson\LessonsPaginate;
use App\Http\Response\APIResponse;
use App\Services\Lesson\LessonService;
use Exception;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function showLesson(Request $request){
        try {

            $request->validate([
                'withDisabled' => 'required|boolean'
            ]);

            $withDisabled = $request->get('withDisabled');

            $service = new LessonService;

            $lessons = $service->showLesson($withDisabled);

            $resource = new LessonsPaginate($lessons);

            return APIResponse::success($resource,'Retrieve successfully lessons');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function showLessonById(FilterLessonByIdRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new LessonService;

            $lesson = $service->showLessonById($validatedRequest);

            $resource = new LessonResource($lesson);

            return APIResponse::success($resource,'Retrieve successfully lesson');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function createLesson(StoreLessonRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new LessonService;

            $lesson = $service->create($validatedRequest);

            return APIResponse::success($lesson->toArray(),'Succesfullly created Lesson!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function updateLesson(UpdateLessonRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new LessonService;

            $lesson = $service->update($validatedRequest);

            return APIResponse::success($lesson->toArray(), 'Succesfully updated Lesson!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function removeLesson(DisableLeassonRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new LessonService;

            $service->remove($validatedRequest);

            return APIResponse::success([],'Successfully removed Lesson!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function changeLessonCourse(ChangeCourseRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new LessonService;

            $lesson = $service->changeLessonCourse($validatedRequest);

            return APIResponse::success($lesson->toArray(), 'Course changed successfully');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
