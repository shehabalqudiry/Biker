<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['payment_image'];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
    public function getPaymentImageAttribute()
    {
        return $this->payment_method->image;
    }

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d h:i:s a", strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("Y-m-d h:i:s a", strtotime($value));
    }

}
