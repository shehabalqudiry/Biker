<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id'                => $this->id,
            'name'              => $this->getCarName(),
            'model'             => $this->getModelName(),
            'photo'             => $this->sizeRelation->photo ?? "",
            'color'             => $this->colorRelation->name ?? "",
            'lat'               => $this->lat ?? "",
            'lon'               => $this->lon ?? "",
            'plat_number'       => $this->plat_number ?? "",
            'color_id'          => $this->color ?? 0,
            'size_id'           => $this->size ?? 0,
            'brand_id'          => $this->car_id ?? 0,
            'model_id'          => $this->car_model_id ?? 0,
            'brand_logo'        => $this->car->logo ?? '',
            // 'isOther'           => $this->size,
        ];
        return $data;
    }
}
