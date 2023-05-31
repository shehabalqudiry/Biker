<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\UserServiceResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class ReservationResource extends JsonResource
{
    public function toArray(Request $request)
    {

        $data = [
            "id"                                    => $this->id,
            "number"                                => $this->number,
            "status"                                => $this->status,
            "status_string"                         => $this->statusString(),
            "user_name"                             => $this->user->name,
            "user_phone"                            => $this->user->phone,
            "lat"                                   => $this->lat ?? "",
            "lon"                                   => $this->lon ?? "",
            "car_brand"                             => $this->car->car->name ?? "",
            'car_model'                             => $this->car->getModelName(),
            'color'                                 => $this->car->colorRelation->name ?? "",
            'services'                              => UserServiceResource::collection($this->services),
            "total"                                 => $this->total,
            "date"                                  => $this->date,
            "time"                                  => $this->time,
            'status_array'                          => $this->statusArray(),
            "biker_name"                            => $this->biker->name ?? "لم يحدد بعد",
            "rate"                                  => $this->rate()->first(['star_num', 'notes']) ?? ['star_num' => 0, 'notes' => ""],
            "payment_method"                        => $this->payment_method,
            "timer"                                 => $this->services->sum('service.time'),
            'updated_at'                            => $this->updated_at->format("Y-m-d H:i:s"),
            'created_at'                            => $this->created_at->format("Y-m-d H:i:s"),
        ];

        return $data;
    }
}
