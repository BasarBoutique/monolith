<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Response\APIResponse;
use App\Repositories\Comment\CommentRepository;
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
        try {
            //code...
        } catch (Exception $e) {
            //throw $th;
        }
    }

}
