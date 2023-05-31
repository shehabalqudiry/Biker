<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['balance'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'wallet_id');
    }

    public function getBalanceAttribute()
    {
<<<<<<< HEAD
        $value = $this->payments()->where('status', 1)->sum('value') ?? 0;
=======
        $value = $this->payments()->where('status', 1)->sum('value');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        return "$value";
    }


}
