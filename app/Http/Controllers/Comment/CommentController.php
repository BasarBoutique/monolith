<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\DisableCommentRequest;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Response\APIResponse;
use App\Services\Comment\CommentService;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showCommentsOfCourse(Request $request){
        try {

            $request->validate([
                'courseId' => 'required|boolean'
            ]);

            $service = new CommentService;

            $comments = $service->showCommentsOfCourse($request->get('courseId'));

            $resource = CommentResource::collection($comments);

            return APIResponse::success($resource);

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function createComment(StoreCommentRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CommentService;

            $comment = $service->create($validatedRequest);

            $resource = new CommentResource($comment);

            return APIResponse::success($resource,'Thank you for your rating, it is greatly appreciated!');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function disableComment(DisableCommentRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CommentService;

            $service->remove($validatedRequest);

            return APIResponse::success([],'Comment removed.');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }


}
