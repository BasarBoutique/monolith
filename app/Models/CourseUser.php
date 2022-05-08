<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;

    protected $table = "courses_users";

    protected $primaryKey = "cu_id";

    protected $fillable = [
        'user_id',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function courseComments()
    {
        return $this->belongsToMany(
            CU_Comment::class,
            Comment::class,
            'cu_id',
            'comment_id'
        );
    }

    protected $dates = ['registered_at'];
}
