<?php

namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\UserResource;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $data_response = CarResource::collection($user->cars()->where('deleted_at', null)->get());
        return returnData('data', $data_response, "السيارات");
    }


    public function create(Request $request)
    {
        $user = $request->user();
        $rules = [
            "brand"                => "required_if:other_brand,null|exists:cars,id",
            "model"                => "required_if:other_model,null|exists:car_models,id",
            "other_brand"          => "required_if:brand,null|string|max:255",
            "other_model"          => "required_if:model,null|max:255|string",
            // "address"              => "required|exists:addresses,id",
        ];

        $validator = Validator::make($request->all(), $rules, attributes:[
            'brand' => "نوع السيارة",
            'other_brand' => "نوع سيارة اخر ",
            'model' => "موديل السيارة",
            'other_model' => "موديل اخر",
        ]);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $car = $user->cars()->create([
            "car_id"            => $request->brand,
            // "address_id"        => $request->address,
            "lat"               => $request->lat,
            "lon"               => $request->lon,
            "other_car"         => $request->brand_other,
            "car_model_id"      => $request->model,
            "other_car_model"   => $request->other_model,
            "color"             => $request->color,
            "size"              => $request->size,
            "plat_number"       => $request->plat_number,
        ]);

        return returnSuccessMessage("تم اضافة السيارة بنجاح");
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $rules = [
            // "address"              => "nullable|exists:addresses,id",
            "brand"                => "required_if:other_brand,null|exists:cars,id",
            "model"                => "required_if:other_model,null|exists:car_models,id",
            "other_brand"          => "required_if:brand,null|string|max:255",
            "other_model"          => "required_if:model,null|max:255|string",
        ];

        $validator = Validator::make($request->all(), $rules, attributes:[
            'brand' => "نوع السيارة",
            'other_brand' => "نوع سيارة اخر ",
            'model' => "موديل السيارة",
            'other_model' => "موديل اخر",
        ]);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $car = $user->cars()->where('id', $request->my_car_id)->first();
        if (!$car) {
            return returnError('ERROR_01', __('Car Not Found'));
        }
        $car->update([
            "car_id"            => $request->brand,
            "other_car"         => $request->brand_other,
            "car_model_id"      => $request->model,
            "other_car_model"   => $request->other_model,
            "color"             => $request->color,
            "size"              => $request->size,
            "plat_number"       => $request->plat_number,
            "lat"               => $request->lat,
            "lon"               => $request->lon,
        ]);

        return returnSuccessMessage("تم تعديل السيارة بنجاح");
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $rules = [
            "my_car_id"                => "required|exists:user_cars,id",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $car = $user->cars()->where('id', $request->my_car_id)->first();

        $car->update(['deleted_at' => now()]);

        return returnSuccessMessage("تم حذف السيارة بنجاح");
    }

}
