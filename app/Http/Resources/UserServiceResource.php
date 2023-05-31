<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserServiceResource extends JsonResource
{
    public function toArray(Request $request)
    {
        $data = [
            "id"                                    => $this->service->id,
            "service_name"                          => $this->service->name,
            "service_image"                         => $this->service->image,
            "service_description"                   => $this->service->description,
            "service_time"                          => $this->service->time,
            "service_cost"                          => $this->service->cost,
            "qt"                                    => $this->count,
        ];
        return $data;
    }
}
