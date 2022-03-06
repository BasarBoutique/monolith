<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

    protected $table = "courses_details";

    protected $fillable = [
        'cdetail_author',
        'cdetail_description'
    ];

    public function teacher()
    {
        return $this->hasOne(User::class, 'user_id', 'cdetail_author');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'course_id');
    }

}
