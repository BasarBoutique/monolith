<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDetial extends Model
{
    use HasFactory;
    
    protected $table = "lesson_detail";

    protected $primaryKey = "ld_id";

    protected $fillable =[
        'ld_title',
        'ld_url',
        'ld_description'
    ];
}
