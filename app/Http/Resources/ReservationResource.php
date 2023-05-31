<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class ReservationResource extends JsonResource
{
    public function toArray(Request $request)
    {
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

        $data = [
            "id"                                    => $this->id,
            "number"                                => $this->number,
            "date"                                  => $this->date,
            "time"                                  => $this->time,
            "car_brand"                             => $this->car->car->name ?? "",
            'model'                                 => $this->car->getModelName(),
            'photo'                                 => $this->car->sizeRelation->photo ?? "",
            'color'                                 => $this->car->colorRelation->name ?? "",
            "status"                                => $this->status,
            "payment_method"                        => $this->payment_method,
            "status_string"                         => $this->statusString(),
            "rate"                                  => $this->rate()->first(['star_num', 'notes']) ?? ['star_num' => 0, 'notes' => ""],
            "timer"                                 => $this->services->sum('service.time'),
            "total"                                 => $this->total,
            "biker_phone"                           => $this->biker->phone ?? "+966540486703",
            "lat"                                   => $this->lat ?? "",
            "lon"                                   => $this->lon ?? "",
            "star_num"                              => $star ?? 0,
        ];
        $data['services']                           = UserServiceResource::collection($this->services);
        if (Route::currentRouteName()) {
            $data['status_array']                       = $this->statusArray();
            $data['updated_at']                         = $this->updated_at->format("Y-m-d H:i:s");
        }
        return $data;
    }
}
