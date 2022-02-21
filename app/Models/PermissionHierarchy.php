<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionHierarchy extends Model
{
    use HasFactory;

    protected $fillable = [
        'ph_label'
    ];

    protected $table = "permission_hierarchies";

    protected $primaryKey = "permission_level";

}
