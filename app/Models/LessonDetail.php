<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    use HasFactory;
    protected $table = "lesson_detail";

    protected $primaryKey = "ld_id";

    const CREATED_AT = null;
    const UPDATED_AT = 'updated_at';

    protected $fillable =[
        'ld_title',
        'ld_url',
        'ld_description'
    ];

    protected $casts = [
        'ld_description' => 'array',
    ];

    protected $dates = ['updated_at'];

    public function detail()
    {
        return $this->hasOne(Lesson::class,'ld_id');
    }
}
