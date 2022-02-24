<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    use HasFactory;

    protected $table = "permission_users";

    protected $primaryKey = "puser_id";

    public function rol()
    {
        return $this->hasOne(PermissionHierarchy::class, 'permission_level');
    }
}
