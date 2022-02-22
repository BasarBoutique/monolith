<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLog extends Model
{
    use HasFactory, HasUuid;

    protected $primaryKey = "clog_uuid";
    protected $keyType = 'string';

    protected $table = "courses_logs";

    protected $fillable = [
        'clog_context',
        'clog_author',
    ];

    protected $dates = ['registered_at'];
}
