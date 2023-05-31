<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLogoAttribute($value)
    {
        return asset($value);
    }

    public function models()
    {
        return $this->hasMany(CarModel::class, 'car_id');
    }


}
