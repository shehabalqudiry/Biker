<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckCoupon extends Component
{
    public $coupon_code, $msg, $total, $success;

    public function check()
    {
        $coupon = Coupon::where('coupon_code', $this->coupon_code)->first();

        if ($coupon) {
            $checkUsed = DB::table('user_coupons')->where('user_id', auth()->user()->id)->where('coupon_id', $coupon->id)->first();

            if (!$checkUsed) {
                $discount = $coupon->value;
                $this->total = $this->total - $discount;
                $this->success = __('The code is correct. The discount has been applied');
                $this->msg = '';
            } else {
                $this->msg = __('The provided coupon code is used.');
            }
        } else {
            $this->msg = __('The provided coupon code is invalid.');
        }
    }

    public function cancel()
    {
        $coupon = Coupon::where('coupon_code', $this->coupon_code)->first();

        $discount = $coupon->value;
        $this->total = $this->total + $discount;
        $this->coupon_code = '';
        $this->success = '';
        $this->msg = '';

    }

    public function render()
    {
        return view('livewire.check-coupon');
    }
}
