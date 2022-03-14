<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLog extends Model
{
    use HasFactory, HasUuid;

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;
    
    protected $primaryKey = "clog_uuid";
    protected $keyType = 'string';

    protected $table = 'comment_log';

    protected $fillable = [
        'clog_context',
        'clog_author'
    ];

    protected $dates = ['registered_at'];
}
