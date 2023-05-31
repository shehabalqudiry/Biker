<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'name'              => $this->name,
            'email'             => $this->email ?? "",
            'profile_image'     => $this->profile_photo_url,
            'api_token'         => $this->api_token ?? "",
        ];
        return $data;
    }
}
