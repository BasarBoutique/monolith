<?php
    
namespace App\Repositories\Comment;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Comment;
use Illuminate\Support\Arr;
use Exception;
use Illuminate\Support\Facades\Log;

class CommentRepository{
    
    public function Comment(){
        $comment = Comment::all()->where('is_enabled',true);
        return compact('comment');
    }

    public function showComment()
    {
        //set model name in here, this is necessary!
    }

    public function createComment(DTOInterface $dto, array $attributes)
    {
        try {
            $commentDTO = $dto::make($attributes);

            $comment = Comment::create($commentDTO);

            $comment->curso_user()->create($commentDTO['cu_id']);


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

    public function editComment()
    {
        //set model name in here, this is necessary!
    }
        
    public function disableComment(array $attributes)
    {
        try {
            $lesson = Comment::findOrFail($attributes['commentId'])->update(['is_enabled' => false]);
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