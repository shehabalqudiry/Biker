<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'phone'             => $this->phone,
<<<<<<< HEAD
            'email'             => $this->email ?? "",
            'status'            => $this->status,
            'gender'            => $this->gender,
            'profile_image'     => asset($this->profile_image),
            'api_token'         => $this->api_token ?? "",
            'otp'               => $this->otp ?? "",
            // 'user_number'       => $this->number ?? "",
=======
            'email'             => $this->email ?? "NA",
            'status'            => $this->status == 0 ? "غير مؤكد" : "تم تأكيد الحساب",
            'address'           => $this->address ?? "",
            'address_short'     => $this->address2 ?? "",
            'address_link'      => $this->address_link ?? "",
            'api_token'         => $this->api_token,
            'otp'               => $this->otp,
            'user_number'       => $this->number,
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ];
        return $data;
    }
}
