<?php

namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = $request->user()->addresses()->latest()->get();
        return returnData('data', $addresses, __('Done.'));
    }

    public function store(Request $request)
    {
        $rules = [
            "name"              => "required|string",
            "location"          => "required|string",
            "lat"               => "nullable|string",
            "long"              => "nullable|string",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $address = $request->user()->addresses()->create([
            "name"              => $request->name,
            "location"          => $request->location,
            "lat"               => $request->lat,
            "long"              => $request->long,
            "description"       => $request->description,
        ]);
        return returnData('data', $address, __('Created Successful'));

    }

    public function update(Request $request)
    {
        $rules = [
            "address_id"        => "required",
<<<<<<< HEAD
            "name"              => "required|string",
            "location"          => "required|string",
            "lat"               => "nullable|string",
            "long"              => "nullable|string",
=======
            "city"              => "required|string",
            "district"          => "nullable|string",
            "street"            => "nullable|string",
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }
        $address = $request->user()->addresses()->where('id', $request->address_id)->first();
        if (!$address) {
            return returnError('404', __('Not Found.'));
        }

        $address->update([
<<<<<<< HEAD
            "name"              => $request->name ?? $address->name,
            "location"          => $request->location ?? $address->location,
            "lat"               => $request->lat ?? $address->lat,
            "long"              => $request->long ?? $address->long,
            "description"       => $request->description ?? $address->description,
=======
            "city"              => $request->city ? $request->city : $address->city,
            "district"          => $request->district ? $request->district : $address->district,
            "street"            => $request->street ? $request->street : $address->street,
            "description"       => $request->description ? $request->description : $address->description,
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ]);

        return returnData('data', $address, __('Updated Successful'));

    }

    public function destroy(Request $request)
    {
        $address = $request->user()->addresses()->where('id', $request->address_id)->first();

        if (!$address) {
            return returnError('404', __('Not Found.'));
        }

        $address->delete();

        return returnSuccessMessage(__('Deleted Successful'));
    }
}
