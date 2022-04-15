<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Ramsey\Uuid\Uuid;

class UserDetail extends Model
{
    use HasFactory, HasImage;

    protected $table = "user_details";

    protected $primaryKey = "user_id";

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($detail) {
            $detail->udetail_uuid = (string) Uuid::uuid4()->toString();
        });
    }

    protected function udetailPhoto() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->getImageUrl($value)
        );
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
