<?php

namespace App\Observers\Comment;

use App\Enums\CommentLogEnum;
use App\Models\Comment;
use App\Models\CommentLog;
use Illuminate\Support\Facades\Log;

class CommentObserver
{
    public function created(Comment $comment)
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

    public function updated(Comment $comment)
    {
        $commmentLog = CommentLog::create([
            'clog_context' => CommentLogEnum::COMMENT_UPDATED,
            'clog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('Comment has been updated', [
            'context' => $commmentLog->clog_context,
        ]);
    }
}
