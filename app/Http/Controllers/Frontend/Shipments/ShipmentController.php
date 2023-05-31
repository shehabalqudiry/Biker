<?php

<<<<<<< HEAD
namespace App\Http\Controllers\APIs\Shipments;
=======
namespace App\Http\Controllers\Frontend\Shipments;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function App\Helpers\otp_generate;
use function App\Helpers\distance;
<<<<<<< HEAD
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;
=======

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use function App\Helpers\settings;
use function App\Helpers\shipment_number;

class ShipmentController extends Controller
{
<<<<<<< HEAD
    public function createShipment(Request $request)
    {

        $rules = [
            "type"                              => "required|in:0,1",
<<<<<<<< HEAD:app/Http/Controllers/Frontend/Shipments/ShipmentController.php
            "delivery_date"                     => "required_if:type,1",
========
            "shipment_consignee_id"             => "nullable|exists:users,number",
>>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e:app/Http/Controllers/APIs/Shipments/ShipmentController.php
        ];

        $validator = Validator::make($request->all(), $rules, attributes:[
=======

    public function create(Request $request)
    {
        if ($request->shipType == 1) {
            return view('frontend.shipments.talkhis');
        }
        return view('frontend.shipments.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            "shipment_consignee_id"             => "nullable|exists:users,number",
            "shipment_type"                     => "required",
            "shipment_weight"                     => "required",
            "shipment_from_lat"                     => "required",
            "shipment_from_long"                     => "required",
            "shipment_to_lat"                     => "required",
            "shipment_to_long"                     => "required",
        ];

        $validator = Validator::make($request->all(), $rules, attributes: [
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            'shipment_consignee_id' => "الرقم التعريفي"
        ]);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
        }

        $kilometer = distance($request->shipment_from_lat, $request->shipment_from_long, $request->shipment_to_lat, $request->shipment_to_lat);
        $weight = Weight::where([['from', '<=', $request->shipment_weight],['to', '>=', $request->shipment_weight]])->first()->price ?? null;
        // $worker = $request->need_workers ? $request->need_workers * settings()->worker_cost : 0;
        $total = (floatval($kilometer) * ($weight ?? settings()->kilo_cost));
        $vat = 0.15 * $total;


        $data = [
            "user_id"                           => $request->user()->id,
            "type"                              => $request->type,
            "shipment_type"                     => $request->shipment_type,
            "delivery_date"                     => $request->delivery_date,
            "shipment_value"                    => $request->shipment_value,
            "shipment_weight"                   => $request->shipment_weight,
            "shipment_temperature"              => $request->shipment_temperature,
            "shipment_consignee_name"           => $request->shipment_consignee_name,
            "shipment_from_lat"                 => $request->shipment_from_lat,
            "shipment_from_long"                => $request->shipment_from_long,
            "shipment_from_address"             => $request->shipment_from_address,
            "shipment_to_lat"                   => $request->shipment_to_lat,
            "shipment_to_long"                  => $request->shipment_to_long,
            "shipment_consignee_city"           => $request->shipment_consignee_city,
            "shipment_consignee_address"        => $request->shipment_consignee_address,
            "shipment_consignee_address_short"  => $request->shipment_consignee_address_short,
            "shipment_consignee_address_url"    => $request->shipment_consignee_address_url,
            "shipment_port"                     => $request->shipment_port,
            "shipment_bill_of_lading"           => $request->shipment_bill_of_lading,
            "shipment_bill_of_lading_file"      => $request->shipment_bill_of_lading_file,
            "shipment_annulment_number"         => $request->shipment_annulment_number,
            "shipment_annulment_file"           => $request->shipment_annulment_file,
<<<<<<<< HEAD:app/Http/Controllers/Frontend/Shipments/ShipmentController.php
            "payment_method"                    => $request->payment_method,
            "description"                       => $request->description,
            "need_workers"                      => $request->need_workers,
========
            "description"                       => $request->description,
            "need_workers"                      => $request->need_workers,
            "workers_cost"                      => $request->need_workers ? $request->need_workers * settings()->worker_cost : null,
            "shipment_consignee_id"             => $request->shipment_consignee_id,
>>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e:app/Http/Controllers/APIs/Shipments/ShipmentController.php
            "shipment_number"                   => shipment_number(),
            "total"                             => number_format($total, 2, '.', ''),
            "vat"                               => number_format($vat, 2, '.', ''),
        ];

        try{
            DB::beginTransaction();
=======
            return back()->withErrors($validator)->withInput();
        }
        try {
            if ($request->shipment_from_lat) {
                $kilometer = distance($request->shipment_from_lat, $request->shipment_from_long, $request->shipment_to_lat, $request->shipment_to_long);
            }

            if ($request->shipment_weight) {
                $weight = Weight::where([['from', '<=', $request->shipment_weight], ['to', '>=', $request->shipment_weight]])->first()->price ?? null;
            }
            $worker = $request->need_workers ? $request->need_workers * settings()->worker_cost : 0;
            if (isset($kilometer)) {
                $total = (floatval($kilometer) * ($weight ?? settings()->kilo_cost) + $worker);
            }else {
                $total = ($weight ?? settings()->kilo_cost) + $worker;
            }
            $vat = 0.15 * $total;


            DB::beginTransaction();
            $data = [
                "user_id"                           => auth()->user()->id,
                "type"                              => $request->type,
                "shipment_type"                     => $request->shipment_type == 'other' ? $request->shipment_type_other : $request->shipment_type,
                "delivery_date"                     => $request->delivery_date,
                "shipment_value"                    => $request->shipment_value,
                "shipment_weight"                   => $request->shipment_weight,
                "shipment_temperature"              => $request->shipment_temperature == 'other' ? $request->shipment_temperature_other : $request->shipment_temperature,
                "shipment_consignee_name"           => $request->shipment_consignee_name,
                "shipment_from_lat"                 => $request->shipment_from_lat,
                "shipment_from_long"                => $request->shipment_from_long,
                "shipment_from_address"             => $request->shipment_from_address,
                "shipment_to_lat"                   => $request->shipment_to_lat,
                "shipment_to_long"                  => $request->shipment_to_long,
                "shipment_consignee_city"           => $request->shipment_consignee_city,
                "shipment_consignee_address"        => $request->shipment_consignee_address,
                "shipment_consignee_address_short"  => $request->shipment_consignee_address_short,
                "shipment_consignee_address_url"    => $request->shipment_consignee_address_url,
                "shipment_port"                     => $request->shipment_port,
                "shipment_bill_of_lading"           => $request->shipment_bill_of_lading,
                "shipment_bill_of_lading_file"      => $request->shipment_bill_of_lading_file,
                "shipment_annulment_number"         => $request->shipment_annulment_number,
                "shipment_annulment_file"           => $request->shipment_annulment_file,
                "description"                       => $request->description,
                "need_workers"                      => $request->need_workers,
                "workers_cost"                      => $request->need_workers ? $request->need_workers * settings()->worker_cost : null,
                "shipment_consignee_id"             => $request->shipment_consignee_id,
                "shipment_number"                   => shipment_number(),
                "total"                             => number_format($total, 2, '.', ''),
                "vat"                               => number_format($vat, 2, '.', ''),
            ];

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            $shipment = Shipment::create($data);

            $shipment->status()->create([
                "status" => 0,
            ]);

<<<<<<< HEAD
            $data_response = new ShipmentResource($shipment);
            DB::commit();
            return returnData('data', $data_response, __('Shipment Created Successful'));
        }catch(\Exception $ex){
            DB::rollback();
            return returnError('ERROR_01', $ex->getMessage());
        }

    }

=======
            DB::commit();
            return redirect()->route('front.shipments.get_pay', $shipment);
        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function get_shipments_pay(Request $request, Shipment $shipment)
    {
        if ($shipment->status()->latest()->first()->status and $shipment->status()->latest()->first()->status > 0) {
            return back()->with('success', __('Shipment Paid'));
        }
        return view('frontend.shipments.pay', compact('shipment'));
    }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    public function shipments_pay(Request $request)
    {

        $rules = [
            "shipment_number"                   => "required|exists:shipments,shipment_number",
            "payment_method"                    => "required|exists:payment_methods,id",
            "coupon_code"                       => "nullable|exists:coupons,coupon_code",
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
        }

        try{
            DB::beginTransaction();
            $shipment = Shipment::where("shipment_number", $request->shipment_number)->first();
=======
            return back()->withErrors($validator)->withInput();
        }

        $shipment = Shipment::where("shipment_number", $request->shipment_number)->first();

        if ($shipment->status()->latest()->first() and $shipment->status()->latest()->first()->status > 0) {
            return back()->with('success', __('Shipment Paid'));
        }
        try {
            DB::beginTransaction();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

            $shipment->status()->create([
                "status" => 1,
            ]);

            $shipment->update([
                "all_total" => $request->all_total,
            ]);

            $total = $shipment->all_total;
<<<<<<< HEAD
            $wallet = $request->user()->wallet;
            $paymentMethod = PaymentMethod::where('id', $request->payment_method)->first();

            if ($paymentMethod and $paymentMethod->type == "wallet"){
                // dd($wallet);
                if ($wallet->balance >= $total){
=======
            $wallet = auth()->user()->wallet;
            $paymentMethod = PaymentMethod::where('id', $request->payment_method)->first();

            if ($paymentMethod and $paymentMethod->type == "wallet") {
                // dd($wallet);
                if ($wallet->balance >= $total) {
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                    $wallet->payments()->create([
                        "value"             => "-$total",
                        "type"              => 2,
                        "status"            => 1,
<<<<<<< HEAD
                        "user_id"           => $request->user()->id,
=======
                        "user_id"           => auth()->user()->id,
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                        "payment_method_id" => $request->payment_method,
                        "description"       => "تم دفع $total لشحنة رقم $shipment->shipment_number",
                    ]);
                } else {
<<<<<<< HEAD
                  return returnError('ERROR_01', __('There is not enough balance'));
=======
                    return back()->with('error', __('There is not enough balance'));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                }
            }

            $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            if ($coupon) {
                if ($coupon->number <= 0) {
<<<<<<< HEAD
                    return returnError(200, 'تم بلوغ الحد الاقصى من استخدام هذا الكوبون');
                }
                //check if user used this code before
                $checkUsed = DB::table('user_coupons')->where('user_id', $request->user()->id)->where('coupon_id', $coupon->id)->first();
=======
                    return back()->with('error', 'تم بلوغ الحد الاقصى من استخدام هذا الكوبون');
                }
                //check if user used this code before
                $checkUsed = DB::table('user_coupons')->where('user_id', auth()->user()->id)->where('coupon_id', $coupon->id)->first();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

                if (!$checkUsed and $total !== 0) {
                    //no quantity after update
                    $discount = $coupon->value;
                    $total = $total - $discount;
                    //update coupon times
                    $number = Coupon::find($coupon->id);
                    $number->update([
                        'number' => $coupon->number - 1
                    ]);
                    $shipment->update([
                        'coupon_id' => $coupon->id,
                        'total_discount' => $total
                    ]);
<<<<<<< HEAD
                    $checkUsed = DB::table('user_coupons')->insert(['user_id' => $request->user()->id, 'coupon_id' => $coupon->id]);
                } else {
                    return returnError(502, 'لقد قمت باستخدام هذا الكوبون من قبل');
=======
                    $checkUsed = DB::table('user_coupons')->insert(['user_id' => auth()->user()->id, 'coupon_id' => $coupon->id]);
                } else {
                    return back()->with('error', 'لقد قمت باستخدام هذا الكوبون من قبل');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                }
            }
            $data_response = new ShipmentResource($shipment);
            DB::commit();
<<<<<<< HEAD
            return returnData('data', $data_response, __('Shipment Created Successful'));
        }catch(\Exception $ex){
            DB::rollback();
            return returnError('ERROR_01', $ex->getMessage());
        }

    }

    public function my_shipments(Request $request)
    {

        $shipments = $request->user()->shipments()->latest()->get();
        $shipments_incoming = Shipment::where('shipment_consignee_id', $request->user()->number)->latest()->get();

<<<<<<<< HEAD:app/Http/Controllers/Frontend/Shipments/ShipmentController.php
        $data_response = ShipmentResource::collection($shipments);
========
        $data_response['outgoing'] = ShipmentResource::collection($shipments);
        $data_response['incoming'] = ShipmentResource::collection($shipments_incoming);
>>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e:app/Http/Controllers/APIs/Shipments/ShipmentController.php
        // $data_response = $shipment;
        return returnData('data', $data_response, __('Done.'));
=======
            return to_route('front.shipments.index', 'outgoing')->with('success', __('Shipment Created Successful'));
        } catch (\Exception $ex) {
            DB::rollback();
            return back()->with('error', $ex->getMessage());
        }
    }

    public function my_shipments(Request $request, $type = 'outgoing')
    {
        $outgoing = Shipment::where('user_id', auth()->user()->id)->latest()->get();
        $incoming = Shipment::where('shipment_consignee_id', auth()->user()->number)->latest()->get();
        // dd(auth()->user()->id);

        return view('frontend.shipments.' . $type, compact($type));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }

    public function tracking_shipment(Request $request)
    {
<<<<<<< HEAD
        $shipment = $request->user()->shipments()->where('shipment_number', $request->shipment_number)->first();
        if(!$shipment){
            return returnError('404', __('No Results Found.'));
        }
<<<<<<<< HEAD:app/Http/Controllers/Frontend/Shipments/ShipmentController.php
        $data_response = [
            "id"                                => $shipment->id,
            "shipment_number"                   => $shipment->shipment_number,
            "user"                              => $shipment->user->name ?? '',
            "sender_address"                    => '',
            "shipment_type"                     => $shipment->shipment_type,
            "delivery_date"                     => date('d/m/Y', strtotime($shipment->delivery_date)),
            "shipment_value"                    => $shipment->shipment_value,
            "shipment_weight"                   => $shipment->shipment_weight,
            "shipment_receiver"                 => $shipment->shipment_consignee_name,
            "shipment_receiver_address"         => $shipment->shipment_consignee_address,
            "status_string"                     => $shipment->getStatusString(),
            "total"                             => $shipment->total,
            "shipment_delivery"                 => $shipment->shipment_delivery ?? "0.0",
            "shipment_description"              => $shipment->description ?? "",
        ];

        return returnData('data', $data_response, __('Done.'));
    }
========
        $data_response = new ShipmentResource($shipment);

        return returnData('data', $data_response, __('Done.'));
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
>>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e:app/Http/Controllers/APIs/Shipments/ShipmentController.php
=======
        $shipment = auth()->user()->shipments()->where('shipment_number', $request->number)->first();
        if (!$shipment) {
            return abort(404);
        }
        $data_response = $shipment;

        return view('frontend.shipments.tracking', compact('shipment'));
    }

    public function e_invoice(Request $request)
    {
        $shipment = auth()->user()->shipments()->where('shipment_number', $request->number)->first();
        if (!$shipment) {
            return abort(404);
        }
        $data_response = $shipment;

        return view('frontend.shipments.e-invoice', compact('shipment'));
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
            return back()->with("'error'", $validator->errors()->first());
        }

        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();

        if ($coupon) {
            //check if user used this code before
            $checkUsed = DB::table('user_coupons')->where('user_id', auth()->user()->id)->where('coupon_id', $coupon->id)->first();

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
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
}
