<?php

namespace App\Models;

use App\Enums\PermissionRoleEnum;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='users';
    protected $primaryKey='user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->roles()->where('permission_level', PermissionRoleEnum::ADMIN)->select('puser_id')->exists();
    }

    public function isTeacher()
    {
        return $this->roles()->where('permission_level', PermissionRoleEnum::TEACHER)->exists();
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class,'user_id');
    }

    public function roles()
    {
        return $this->hasMany(PermissionUser::class, 'user_id', 'user_id');
    }

    public function purcharsedCourses()
    {
        return $this->belongsTo(CourseUser::class,'user_id');
    }

    public function teachableCourses()
    {
        return $this->hasMany(CourseDetail::class, 'cdetail_author', 'user_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    public function permissions_user($rol){
        $this->roles()->create([
            "permission_level"=>$rol,
            "user_id"=>$this->user_id
        ]);
        $this->detail()->create();
    }
}
