<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            "ID"                => $this->id,
            "Message"           => $this->data['message'] ?? "",
            "Image"             => $this->data['image'] !== "" ? asset($this->data['image']) : asset('uploads/notification.png'),
            "created_at"        => $this->created_at->format('d-m-Y h:i') ?? "",
         ];

        return $data;
    }
}
