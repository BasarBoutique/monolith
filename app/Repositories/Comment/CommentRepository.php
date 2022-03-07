<?php
    
namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository{
    
    public function Comment(){
        $comment = Comment::all()->where('is_enabled',true);
        return compact('comment');
    }

    public function show()
    {
        //set model name in here, this is necessary!
    }

    public function create()
    {
        //set model name in here, this is necessary!
    }

    public function edit()
    {
        //set model name in here, this is necessary!
    }
        
    public function disable()
    {
        //set model name in here, this is necessary!
    }

}