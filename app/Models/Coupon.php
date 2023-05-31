<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
