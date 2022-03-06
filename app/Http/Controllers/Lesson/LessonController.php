<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Response\APIResponse;
use App\Repositories\Lesson\LessonRepository;
use Exception;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function Lesson(){
        try {
            $resource = new LessonRepository;

            $lesson = $resource->Lesson();

            return APIResponse::make(true,$lesson);
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }
}
