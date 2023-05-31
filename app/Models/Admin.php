<?php

namespace App\Models;

use Avatar;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [];
<<<<<<< HEAD
    protected $guard = 'admin';
=======
    // protected $appends = ['profile_photo_url'];
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfilePhotoUrlAttribute($value)
    {
        if (!$value) {
            $value = Avatar::create($this->name)->toBase64();
        }
        return $value;
    }

}
