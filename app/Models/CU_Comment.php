<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CU_Comment extends Model
{
    use HasFactory;

    
    
    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;
    
    protected $primaryKey = "cuc_id";
    protected $table = "cu_comment";

    protected $fillable =[
        'comment_id',
        'cu_id'
    ];
    
    protected $dates = ['registered_at'];
}
