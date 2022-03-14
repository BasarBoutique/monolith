<?php

namespace App\Observers\Comment;

use App\Enums\CommentLogEnum;
use App\Models\Comment;
use App\Models\CommentLog;
use Illuminate\Support\Facades\Log;

class CommentObserver
{
    public function updating(Comment $comment){
        if ($comment->isDirty('is_enabled')) {
            $this->whenRomveComment($comment);
        }
    }

    public function created()
    {
        $commmentLog = CommentLog::create([
            'clog_context' => CommentLogEnum::COMMENT_CREATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New comment has been created', [
            'context' => $commmentLog->clog_context,
            'author' => $commmentLog->clog_author,
        ]);
    }

    public function whenRomveComment(Comment $comment)
    {
        $commmentLog = CommentLog::create([
            'clog_context' => CommentLogEnum::COMMENT_REMOVED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Comment has been updated', [
            'context' => $commmentLog->clog_context,
            'author' => $commmentLog->clog_author,
        ]);
    }
}
