<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'udetail_fullname',
        'udetail_photo',
        'udetail_direction',
        'udetail_movil'
    ];

    protected $table = "user_details";
}
