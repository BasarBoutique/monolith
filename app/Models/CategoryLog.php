<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLog extends Model
{
    use HasFactory, HasUuid;

    const CREATED_AT = 'registered_at';
    const UPDATED_AT = null;

    protected $primaryKey = "catlog_uuid";
    protected $keyType = 'string';

    protected $table = "category_log";

    protected $fillable = [
        'catlog_context',
        'catlog_author',
    ];

    protected $dates = ['registered_at'];
}
