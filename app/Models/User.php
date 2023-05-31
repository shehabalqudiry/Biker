<?php

namespace App\Models;

use Avatar;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

<<<<<<< HEAD
    public function cars()
    {
        return $this->hasMany(UserCar::class, 'user_id');
    }

=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    public function getProfilePhotoUrlAttribute($value)
    {
        if (!$this->profile_photo_url) {
            $value = Avatar::create($this->name)->toBase64();
<<<<<<< HEAD
        }else {
            $value =asset($value);
        }
        return $value;
    }

    public function getOtpAttribute($value)
    {
        return strval($value);
    }
=======
        }
        return $value;
    }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
}
