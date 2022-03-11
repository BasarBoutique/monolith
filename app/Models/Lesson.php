<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    
    protected $table = "lesson";

    protected $primaryKey = "lesson_id";

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;
    
    protected $fillable = [
        'course_id',
        'ld_id',
        'is_enabled'
    ];

    protected $dates = ['registered_at'];
}
