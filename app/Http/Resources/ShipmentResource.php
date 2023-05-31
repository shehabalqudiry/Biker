<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $data = [
            "id"                                => $this->id,
            "shipment_number"                   => $this->shipment_number,
            "user"                              => $this->user->name ?? '',
            "sender_address"                    => $this->shipment_from_address,
            "type_string"                       => $this->type == "0" ? "نقل شحنة" : "تخليص جمركي",
            "type_int"                          => $this->type,
            // "shipment_type"                     => $this->shipment_type,
            "delivery_date"                     => date('d/m/Y', strtotime($this->delivery_date)),
            "shipment_value"                    => $this->shipment_value,
            "shipment_weight"                   => $this->shipment_weight,
            "shipment_temperature"              => $this->shipment_temperature,
            "shipment_receiver"                 => $this->shipment_consignee_name,
            // "shipment_from_lat"                 => $this->shipment_from_lat,
            // "shipment_from_long"                => $this->shipment_from_long,
            // "shipment_to_lat"                   => $this->shipment_to_lat,
            // "shipment_to_long"                  => $this->shipment_to_long,
            // "shipment_consignee_city"           => $this->shipment_consignee_city,
            "shipment_receiver_address"        => $this->shipment_consignee_address,
            // "shipment_consignee_address_short"  => $this->shipment_consignee_address_short,
            // "shipment_consignee_address_url"    => $this->shipment_consignee_address_url,
            // "shipment_port"                     => $this->shipment_port ?? '',
            // "shipment_bill_of_lading"           => $this->shipment_bill_of_lading ?? '',
            // "shipment_bill_of_lading_file"      => $this->shipment_bill_of_lading_file ?? '',
            // "shipment_annulment_number"         => $this->shipment_annulment_number ?? '',
            // "shipment_annulment_file"           => $this->shipment_annulment_file ?? '',
            "status_string"                     => $this->status()->get(),
            // "status_int"                        => $this->status,
            // "payment_method"                    => $this->payment_method,
            "total"                             => $this->total,
            "total_discount"                    => $this->total_discount ?? "لم يتم استخدام كوبون خصم",
            "coupon"                               => $this->coupon->coupon_code ?? "",
            "customs_declaration_fees"          => $this->customs_declaration_fees ?? "10",
            "delivery_authorization"            => $this->delivery_authorization ?? "15",
            "customs_clearance"                 => $this->customs_clearance ?? "20",
            // "shipment_delivery"                 => $this->shipment_delivery ?? '',
            // "translate"                         => $this->translate ?? '',
            // "workers_wages"                     => $this->workers_wages ?? '',
            "shipment_description"              => $this->description ?? "",
            "all_total"                         => $this->all_total ?? "0",
            "workers_cost"                      => "$this->workers_cost" ?? "",
            "shipment_invoice_url"              => route('front.index') ?? "",
            "user_balance"                      => auth()->user()->wallet->balance ?? "0",
        ];
        return $data;
    }
}
