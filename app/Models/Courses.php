<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_title',
        'course_photo',
        'course_is_enabled'
    ];

    protected $primaryKey = "course_id";

    public function courses_details(){
        return $this->hasMany(CoursesDetail::class,'course_id');
    }

    public function courses(){
        return $this->belongsTo(CoursesUser::class,'course_id');
    }

}
