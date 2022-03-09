<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CU_Comment extends Model
{
    use HasFactory;

    protected $table = "cu_comment";

    protected $primaryKey = "cuc_id";

    public function comment(){
        return $this->belongsTo(Comment::class,"comment_id");
    }

    public function user(){
        return $this->belongsTo(User::class,"cu_id");
    }
}
