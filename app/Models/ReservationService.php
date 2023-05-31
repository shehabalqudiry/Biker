<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $appends = ['service_details'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // public function getServiceDetailsAttribute()
    // {
    //     return $this->service;
    // }
}
