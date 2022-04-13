<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = "user_details";

    protected $primaryKey = "user_id";

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($detail) {
            $detail->udetail_uuid = (string) Uuid::uuid4()->toString();
        });
    }

    protected $fillable = [
        'udetail_fullname',
        'udetail_photo',
        'udetail_direction',
        'udetail_movil'
    ];

    public function assignImage(?string $link)
    {
        $this->udetail_photo = $link;
        $this->save();
    }

}
