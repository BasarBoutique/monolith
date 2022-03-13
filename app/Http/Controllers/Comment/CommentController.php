<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\DisableCommentRequest;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Comment\CommentRepository;
use App\Services\Comment\CommentService;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showComments(Request $request){
        try {

            $request->validate([
                'courseId' => 'required|boolean'
            ]);

            $resource = new CommentService;

            $comment = $resource->showComments($request->get('courseId'));

            return APIResponse::make(true,$comment);
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function createComment(StoreCommentRequest $request){
        try {
            $validatedRequest = $request->validated();

            $service = new CommentService;

            $service->create($validatedRequest);

            return APIResponse::success([],'Thank you for your rating, it is greatly appreciated!');
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
