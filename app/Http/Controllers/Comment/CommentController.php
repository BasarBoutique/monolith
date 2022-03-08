<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Comment\CommentRepository;
use App\Services\Comment\CommentService;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Comment(){
        try {
            $resource = new CommentRepository;
    
            $comment = $resource->Comment();

            return APIResponse::make(true,$comment);
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(),500);
        }
    }

    public function showComment(){
    }

    public function createComment(StoreCommentRequest $request){
        return $request;
        // try {
        //     $validatedRequest = $request->validated();

        //     $service = new CommentService;

        //     $service->create($validatedRequest);

        //     return APIResponse::success([],'Thank you for your rating, it is greatly appreciated!');
        // } catch (Exception $e) {
        //     return APIResponse::fail($e->getMessage(),500);
        // }
    }
    

}
