<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cdetail_author',
        'cdetail_description'
    ];
    protected $table = "courses_details";
}
