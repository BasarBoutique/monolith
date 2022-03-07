<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $primaryKey = "comment_id";

    protected $filable = [
        'comment_rating',
        'comment_description',
        'is_enabled'
    ];
}
