<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWork extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "how_work";

    public function getPhotoAttribute($value)
    {
        return asset($value);
    }

}
