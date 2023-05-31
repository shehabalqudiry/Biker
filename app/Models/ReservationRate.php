<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationRate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getNotesAttribute($value)
    {
        if (!$value) {
            return "";
        }
        return $value;
    }

}
