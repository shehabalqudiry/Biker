<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car()
    {
        $this->belongsTo(Car::class, 'car_id');
    }
}
