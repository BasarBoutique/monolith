<?php

namespace App\Models;

use App\Models\Scopes\IsEnabledScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = "permissions";

    protected static function booted()
    {
        static::addGlobalScope(new IsEnabledScope);
    }

    public function detail()
    {
        return $this->belongsTo(PermissionDetail::class, 'pd_id');
    }

    public function rol()
    {
        return $this->belongsTo(PermissionHierarchy::class, 'permission_level');
    }

}
