<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_title',
        'course_photo',
        'is_enabled'
    ];

    public function detail()
    {
        return $this->hasOne(CourseDetail::class,'course_id');
    }

    public function students()
    {
        return $this->belongsToMany(
            User::class,
            CourseUser::class,
            'course_id',
            'user_id'
        );
    }

}
