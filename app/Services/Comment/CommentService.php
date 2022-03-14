<?php

namespace App\Services\Comment;

use App\DTO\Comment\CommentUserDTO;
use App\Repositories\Comment\CommentRepository;

class CommentService
{

    private $commentRespository;

    public function __construct()
    {
        $this->commentRespository = new CommentRepository;
    }

    public function showCommentsOfCourse(int $courseId)
    {
        return $this->commentRespository->showCommentsOfCourse($courseId);
    }

    public function create(array $attributes)
    {
        $commentDTO = new CommentUserDTO;

        $comment = $this->commentRespository->createComment($commentDTO,$attributes);

        return $comment;
    }


    public function remove(array $attributes)
    {
        $comment = $this->commentRespository->disableComment($attributes);

        return $comment;
    }
}
