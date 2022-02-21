<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission_Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'plog_context',
        'plog_author'
    ];

    protected $primaryKey = "plog_id";
    protected $table = "permission_logs";
}
