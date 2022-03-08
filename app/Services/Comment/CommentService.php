<?php
    
namespace App\Services\Comment;

use App\DTO\Comment\CommentDTO;
use App\Repositories\Comment\CommentRepository;

class CommentService{
    
    private $commentRespository;

    public function __construct()
    {
        $this->commentRespository = new CommentRepository;
    }

    public function create(array $attributes)
    {
        $commentDTO = new CommentDTO;

        $comment = $this->commentRespository->createComment($commentDTO,$attributes);

        return $comment;
    }

    public function update(array $attributes)
    {
        /** */
    }

    public function remove()
    {
        /** */
    }
}