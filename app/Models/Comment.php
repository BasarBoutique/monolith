<?php

namespace App\Models;

use App\Models\Scopes\IsEnabledScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $primaryKey = "comment_id";

    protected $fillable = [
        'comment_rating',
        'comment_description',
        'is_enabled'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new IsEnabledScope);
    }

    public function courseComment()
    {
        return $this->hasOne(
            CU_Comment::class,
            'comment_id',
            'comment_id'
        );
    }

    public function course()
    {
        // return $this->belongsTo()
    }

    public function scopeOfCourse($query, int $courseId)
    {
        return $query->with(
            [
                'courseComment' => function($courseComment) use ($courseId) {
                    $courseComment->whereHas('courseUser', function($courseUser) use ($courseId) {
                        $courseUser->where('course_id', $courseId);
                    });
                }
            ]
    );
    }
}
