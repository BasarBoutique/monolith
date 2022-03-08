<?php
    
namespace App\Repositories\Comment;

use App\DTO\Interfaces\DTOInterface;
use App\Models\Comment;

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
        $commentDTO = $dto::make($attributes);

        $comment = Comment::create($commentDTO);

        $comment->curso_user()->create($commentDTO['cu_id']);

        return $comment;
    }

    public function editComment()
    {
        //set model name in here, this is necessary!
    }
        
    public function disableComment()
    {
        //set model name in here, this is necessary!
    }

}