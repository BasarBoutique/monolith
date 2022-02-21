<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses_Logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'clog_context',
        'clog_author',
        'registered_at'
    ];

    protected $primaryKey = "clog_uuid";
    
    protected $table = "courses_logs";
}
