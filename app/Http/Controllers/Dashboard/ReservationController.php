<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ReservationResource;
use App\Http\Resources\UserResource;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\notify_user;
use function App\Helpers\otp_generate;
use function App\Helpers\reservation_number;
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::where(function($q) use ($request) {

            if ($request->from and $request->to) {
                $q->whereBetween('created_at', [$request->from, $request->to]);
            }
            if ($request->status) {
                $q->where('status', $request->status);
            }
            if ($request->nameSearch) {
                $q->whereRelation('biker', 'name', "LIKE", $request->nameSearch)->orWhereRelation('user', 'name', "LIKE", $request->nameSearch);
            }

        })->get();

        $data = ReservationResource::collection($reservations);

        return returnData('data', $data, "الحجوزات");
    }

    public function show(Request $request, $id)
    {
        $reservation = Reservation::where('id', $id)->first();

        $data = new ReservationResource($reservation);

        return returnData('data', $data, "تفاصيل الحجز");
    }

    public function create(Request $request)
    {

        $rules = [
            "user_id"                         => "required|exists:users,id",
            "user_car_id"                     => "nullable|exists:user_cars,id",
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
                "use_gift"                          => $request->use_gift ?? 0,
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
            if ($request->use_gift == 1) {
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

}
