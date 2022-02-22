<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionDetail extends Model
{
    use HasFactory;

    protected $table = "permission_details";
    protected $primaryKey = "pd_id";

    protected $fillable = [
        'pd_label',
        'pd_description'
    ];


}
