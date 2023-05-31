<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = [];
    protected $appends = ['status_string'];
    protected $table = 'shipment_status';

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'user_id');
=======
    protected $table = 'shipment_status';
    protected $guarded = [];
    protected $appends = ['status_string'];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }

    public function getStatusStringAttribute()
    {
        switch ($this->status) {
            case 0:
<<<<<<< HEAD
                return __('Awaiting payment');
=======
                return __('Awaiting Payment');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                break;

            case 1:
                return __('Under Processing');
                break;

            case 2:
                return __('On the way to you');
                break;

            case 3:
                return __('The shipment has been received');
                break;
<<<<<<< HEAD
                
=======

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            default:
                return __('The shipment has been received');
                # code...
                break;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }
}
