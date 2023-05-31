<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderWeb extends Model
{
    use HasFactory;

    protected $table = 'sliders_web';
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return asset($value);
    }
}
