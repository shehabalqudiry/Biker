<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['car_name', 'car_image', 'model_name'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }


    public function colorRelation()
    {
        return $this->belongsTo(Color::class, 'color');
    }

    public function sizeRelation()
    {
        return $this->belongsTo(Size::class, 'size');
    }


    public function getCarName()
    {
        if ($this->car_id) {
            $value = $this->car->name ?? "";
        }else {
            $value = $this->other_car;
        }
        return $value;
    }

    public function getModelName()
    {
        if ($this->car_model_id) {
            $value = $this->car_model->name ?? "";
        }else {
            $value = $this->other_car_model;
        }
        return $value;
    }

    public function getCarImage()
    {
        if ($this->car_id) {
            $value = $this->car->logo ?? asset("uploads/cars/other.png");
        }else {
            $value = asset('uploads/cars/other.png');
        }
        return $value;
    }



}
