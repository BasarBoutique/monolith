<?php

namespace App\Enums;

enum CommentLogEnum : string {
    const COMMENT_CREATED = 'COMMENT_CREATED';
    const COMMENT_UPDATED = 'COMMENT_UPDATED';
    const COMMENT_REMOVED = 'COMMENT_REMOVED';
}
