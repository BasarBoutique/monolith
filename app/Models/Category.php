<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    protected $primaryKey = "category_id";
    
    protected $fillable = [
        'category_title',
        'category_ico',
        'is_enabled'
    ];

    public function courses()
    {
        return $this->belongsToMany(
            Courses::class,
            CourseCategory::class,
            'category_id',
            'course_id'
        );
    }

}
