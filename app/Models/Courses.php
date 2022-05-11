<?php

namespace App\Models;

use App\Models\Scopes\IsEnabledScope;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory, HasImage;

    protected $table = 'courses';
    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_title',
        'course_photo',
        'is_enabled'
    ];

    protected function coursePhoto() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getImageUrl($value)
        );
    }


    public function detail()
    {
        return $this->hasOne(CourseDetail::class,'course_id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'course_id', 'course_id');
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

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'course_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new IsEnabledScope);
    }

    public function scopeWithDisabledCourses($query)
    {
        return $query->withoutGlobalScope(IsEnabledScope::class);
    }

    public function countLessons()
    {
        return $this->lessons->count();
    }

    public function countStudents()
    {
        return $this->students->count();
    }

}
