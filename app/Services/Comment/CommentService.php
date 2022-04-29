<?php

namespace App\Services\Comment;

use App\DTO\Comment\CommentUserDTO;
use App\Repositories\Comment\CommentRepository;
use Exception;
use Illuminate\Support\Facades\Log;
class CommentService
{

    private $commentRespository;

    public function __construct()
    {
        $this->commentRespository = new CommentRepository;
    }

    public function showCommentsOfCourse(int $courseId)
    {
        try {
            return $this->commentRespository->showCommentsOfCourse($courseId);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function create(array $attributes)
    {
        try {
            $commentDTO = new CommentUserDTO;

            $comment = $this->commentRespository->createComment($commentDTO,$attributes);

            return $comment;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }


    public function remove(array $attributes)
    {
        try {
            $comment = $this->commentRespository->disableComment($attributes);

            return $comment;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }
}
