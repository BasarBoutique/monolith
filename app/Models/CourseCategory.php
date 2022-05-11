<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseCategory extends Pivot
{
    use HasFactory;

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;

    protected $table = "course_category";

    protected $primaryKey = "cc_id";

    protected $fillable = [
        'category_id',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'course_id');
    }

    public function detail()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }


}
