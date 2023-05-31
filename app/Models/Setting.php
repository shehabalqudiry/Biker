<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

<<<<<<< HEAD
    public function getSupportImageAttribute($value)
    {
        return asset($value);
    }
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
}
