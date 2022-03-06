<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    
    protected $table = "lesson";

    protected $primaryKey = "lesson_id";

    protected $fillable = [
        'course_id',
        'ld_id'
    ];

    public function detail()
    {
        return $this->hasOne(LessonDetial::class,'ld_id');
    }


}
