<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(ReservationService::class, 'reservation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function biker()
    {
        return $this->belongsTo(Biker::class, 'biker_id');
    }

    public function car()
    {
        return $this->belongsTo(UserCar::class, 'user_car_id');
    }

    public function rate()
    {
        return $this->hasOne(ReservationRate::class, 'reservation_id');
    }


    public function statusString()
    {
        switch ($this->status) {
            case '0':
                $message = "تم إلغاء الحجز";
                break;
            case '1':
                $message = "تم الحجز في " . $this->time;
                break;
            case '2':
                $message = "البايكر في الطريق أليك";
                break;
            case '3':
                $message = "أفتح المزيونة";
                break;
            case '4':
                $message = "سيارتك جاهزة";
                break;

            default:
                $message = "تم الحجز في " . $this->time;
                break;
        }

        return $message;
    }

    public function statusArray()
    {
        $array = [
            // [
            //     "name" => "تم إلغاء الحجز",
            //     "done" => $this->status == 0 ? true : false,
            // ],
            [
                "name" => "تم الحجز في " . $this->time,
                "done" => $this->status >= 1 and $this->status !== 0 ? true : false,
            ],
            [
                "name" => "البايكر في الطريق أليك",
                "done" => $this->status >= 2 and $this->status !== 0 ? true : false,
            ],
            [
                "name" => "أفتح المزيونة",
                "done" => $this->status >= 3 and $this->status !== 0 ? true : false,
            ],
            [
                "name" => "سيارتك جاهزة",
                "done" => $this->status >= 4 and $this->status !== 0 ? true : false,
            ],
        ];
        return $array;
    }
}
