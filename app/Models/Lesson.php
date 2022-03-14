<?php

namespace App\Models;

use App\Models\Scopes\IsEnabledScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    
    protected $table = "lesson";

    protected $primaryKey = "lesson_id";

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;
    
    protected $fillable = [
        'course_id',
        'ld_id',
        'is_enabled'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new IsEnabledScope);
    }

    protected $dates = ['registered_at'];

    public function scopeWithDisabledLesson($query)
    {
        return $query->withoutGlobalScope(IsEnabledScope::class);
    }

    public function detail(){
        return $this->belongsTo(LessonDetial::class,'ld_id');
    }

}
