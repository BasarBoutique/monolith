<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_title',
        'category_ico',
        'is_enabled'
    ];

    protected $primaryKey = "category_id";

}
