<?php

namespace App\Repositories\Comment;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Comment;
use Illuminate\Support\Arr;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentRepository{

    public function showCommentsOfCourse(int $courseId)
    {
        try {
            return Comment::ofCourse($courseId)->get();
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
       
    }

    public function createComment(DTOInterface $dto, array $attributes)
    {
        try {
            $commentDTO = $dto::make($attributes);

            $comment = Comment::create($commentDTO['comment']);

            $comment->courseComment()->create($commentDTO['cu_id']);


            return $comment;
        } catch (Exception $e) {
                Log::error($e->getMessage(),[
                    'LEVEL' => 'Repository',
                    'TRACE' => $e->getTraceAsString()
                ]);

                throw $e;

                return false;
        }
    }

    public function disableComment(array $attributes)
    {
        try {
            $lesson = Comment::findOrFail($attributes['commentId']);

            $lesson->update(['is_enabled' => !$lesson->is_enabled]);

            return $lesson;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;

            return false;
        }
    }

}
