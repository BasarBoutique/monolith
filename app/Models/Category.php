<?php

namespace App\Models;

use App\Models\Scopes\IsEnabledScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const SLIDE_PER_PAGE = 5;

    protected $table = "category";
    protected $primaryKey = "category_id";

    protected $fillable = [
        'category_title',
        'category_ico',
        'is_enabled'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new IsEnabledScope);
    }

    public function courses()
    {
        return $this->belongsToMany(
            Courses::class,
            CourseCategory::class,
            'category_id',
            'course_id'
        );
    }

    public function scopeWithDisabledCategories($query)
    {
        return $query->withoutGlobalScope(IsEnabledScope::class);
    }
}
