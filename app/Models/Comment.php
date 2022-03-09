<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $primaryKey = "comment_id";

    protected $fillable = [
        'comment_rating',
        'comment_description',
    ];

    public function curso_user(){
        return $this->hasMany(CU_Comment::class,'comment_id');
    }
}
