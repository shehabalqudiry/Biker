<?php

namespace App\Http\Controllers\APIs\Reservations;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Service;
use App\Models\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function App\Helpers\otp_generate;
use function App\Helpers\distance;
use function App\Helpers\notify_user;
use function App\Helpers\reservation_number;
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;
use function App\Helpers\settings;
use function App\Helpers\shipment_number;

class ReservationController extends Controller
{
    public function index(Request $request)
    {

        $reservations = $request->user()->reservations()->where('payment_method', '!=', 0)->latest()->get();

        $data_response['current'] = ReservationResource::collection($reservations->whereIn("status", [1,2,3]));
        $data_response['previous'] = ReservationResource::collection($reservations->where("status", 4));
        return returnData('data', $data_response, __('Done.'));
    }

    public function create(Request $request)
    {

        $rules = [
            "my_car_id"                       => "nullable|exists:user_cars,id",
            "services"                        => "required|array|min:1",
            "services.*.service_id"           => "exists:services,id",
            "date"                            => "required|string",
            "time"                            => "required|string",
            // "payment_method"                  => "required|exists:payment_methods,id",
            // "address"                         => "required|exists:addresses,id",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        try{
            DB::beginTransaction();
            $reservation = Reservation::create([
                "lat"                               => $request->lat,
                "lon"                               => $request->lon,
                "user_id"                           => $request->user()->id,
                "user_car_id"                       => $request->my_car_id,
                "payment_method"                    => $request->payment_method ?? 0,
                "date"                              => $request->date,
                "time"                              => $request->time,
                "number"                            => reservation_number(),
                "status"                            => 1,
                "total"                             => 0,
            ]);

            // dd($request->services);
            foreach ($request->services as $value) {
                $reservation->services()->create([
                    "service_id" => $value['service_id'],
                    "count" => $value['qt'],
                ]);

                $reservation->update([
                    "total" => $reservation->total + (Service::where('id', $value['service_id'])->first()->cost * $value['qt']) ?? 0,
                ]);
            }


            $data_response = new ReservationResource($reservation);
            DB::commit();
            notify_user([
                'user_id' => $request->user()->id,
                'message'=> "عزيزي العميل, أستلمنا طلبك وسنصلك بالوقت المحدد" ,
                'url'=> "",
                'image'=> "uploads/notification.png",
                'methods'=>['database']
            ]);
            // notify_user("عزيزي العميل, أستلمنا طلبك وسنصلك بالوقت المحدد");
            return returnData('data', $data_response, __('Reservation Created Successful'));
        }catch(\Exception $ex){
            DB::rollback();
            return returnError('ERROR_01', $ex->getMessage());
        }

    }

    public function pay(Request $request)
    {

        $rules = [
            "order_id"                        => "required",
            "payment_method"                  => "required|exists:payment_methods,id",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }
        $reservation = Reservation::where('id', $request->order_id)->first();
        if (!$reservation) {
            return returnError('ERROR_50', "الطلب غير صحيح");
        }
        try{
            DB::beginTransaction();
            $paymentMethod = PaymentMethod::where('id', $request->payment_method)->first();
            $total = $reservation->total;
            if ($request->payment_method == 6) {
                $star = 0;
                $user = $request->user();
                if ($user->gift_was_used_in != null) {
                    $reservations_count = $request->user()->reservations()->whereBetween('created_at', [$user->gift_was_used_in, Carbon::now()])->where('status', 4)->count();
                    if ($reservations_count >= 5) {
                        $star = 5;
                    }else {
                        $star = $reservations_count;
                    }
                }else {
                    $reservations_count = $request->user()->reservations()->where('status', 4)->count();
                    if ($reservations_count >= 5) {
                        $star = 5;
                    }else {
                        $star = $reservations_count;
                    }
                }
                if ($star < 5) {
                    return returnError('ERROR_11', "لا يمكنك طلب هدية الان");
                }
                $reservation->update([
                    "old_total" => $reservation->total,
                    "total" => 0,
                ]);
                $request->user()->update([
                    "gift_was_used_in" => now(),
                ]);
            }
            $reservation->update([
                "payment_method"                    => $request->payment_method,
            ]);
            $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            if ($coupon) {
                if ($coupon->number <= 0) {
                    return returnError(200, 'تم بلوغ الحد الاقصى من استخدام هذا الكوبون');
                }
                //check if user used this code before
                $checkUsed = DB::table('user_coupons')->where('user_id', $request->user()->id)->where('coupon_id', $coupon->id)->first();

                if (!$checkUsed and $total !== 0) {
                    //no quantity after update
                    $discount = $coupon->value;
                    $total = $total - $discount;
                    //update coupon times
                    $number = Coupon::find($coupon->id);
                    $number->update([
                        'number' => $coupon->number - 1
                    ]);
                    $reservation->update([
                        'coupon_id' => $coupon->id,
                        'total' => $total
                    ]);
                    $checkUsed = DB::table('user_coupons')->insert(['user_id' => $request->user()->id, 'coupon_id' => $coupon->id]);
                } else {
                    return returnError(502, 'لقد قمت باستخدام هذا الكوبون من قبل');
                }
            }
            $wallet = auth()->user()->wallet;
            if ($paymentMethod and $paymentMethod->type == "wallet") {
                // dd($wallet->balance);
                if ($wallet->balance >= $total) {
                    $wallet->payments()->create([
                        "value"             => "-$total",
                        "type"              => 2,
                        "status"            => 1,
                        "user_id"           => auth()->user()->id,
                        "payment_method_id" => $request->payment_method,
                        "description"       => "تم دفع $total لحجز رقم $reservation->number",
                    ]);
                } else {
                    return returnError(305, __('There is not enough balance'));
                }
            }

            DB::commit();
            $data_response = new ReservationResource($reservation);
            notify_user([
                'user_id' => $request->user()->id,
                'message'=> "عزيزي العميل, أستلمنا طلبك وسنصلك بالوقت المحدد" ,
                'url'=> "",
                'image'=> "uploads/notification.png",
                'methods'=>['database']
            ]);
            return returnData('data', $data_response, __('Reservation Created Successful'));
        }catch(\Exception $ex){
            DB::rollback();
            return returnError('ERROR_01', $ex->getMessage());
        }

    }



    public function tracking(Request $request)
    {
        $reservation = $request->user()->reservations()->where('id', $request->id)->first();
        if(!$reservation){
            return returnError('404', __('No Results Found.'));
        }
        $data_response = new ReservationResource($reservation);

        return returnData('data', $data_response, __('Done.'));
    }


    public function cancel(Request $request)
    {
        $reservation = $request->user()->reservations()->where('id', $request->id)->first();
        if(!$reservation){
            return returnError('404', __('No Results Found.'));
        }

        if($reservation->status > 1){
            return returnError('400', "لا يمكنك إلغاء الحجز في هذه المرحلة");
        }

        $reservation->update(['status' => 0]);
        $data_response = new ReservationResource($reservation);

        return returnSuccessMessage("تم إلغاء الحجز");
    }

    public function rate(Request $request)
    {
        $reservation = $request->user()->reservations()->where('id', $request->id)->first();
        if(!$reservation){
            return returnError('404', __('No Results Found.'));
        }

        $reservation->rate()->create([
            'user_id'   => $request->user()->id,
            'star_num'  => $request->star_num,
            'notes'     => $request->notes,
        ]);
        // $data_response = new ReservationResource($reservation);

        return returnSuccessMessage("تم التقييم بنجاح");
    }

    public function checkCoupon(Request $request)
    {
        //rules for validation
        $rules = [
            'coupon_code' => 'required',
        ];

        //validation
        $validator = validator()->make($request->all(), $rules);

        //validation failure

        if ($validator->fails()) {
            return returnError("0000", $validator->errors()->first());
        }

        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();

        if ($coupon) {
            //check if user used this code before
            $checkUsed = DB::table('user_coupons')->where('user_id', $request->user()->id)->where('coupon_id', $coupon->id)->first();

            if (!$checkUsed) {
                //no quantity after update
                $discount = $coupon->value;

                return returnData('data', [
                    'discount' => $discount
                ], __("Done."));
            } else {
                return returnData('data', [
                    'discount' => 0
                ], __('The provided coupon code is used.'));
            }
        } else {
            return returnData('data', [
                'discount' => 0
            ], __('The provided coupon code is invalid.'));
        }
    } //end of check coupon
}
