<?php

<<<<<<< HEAD
namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
=======
namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Models\Address;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnValidationError;

class AddressController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request)
    {
        $addresses = $request->user()->addresses()->latest()->get();
        return returnData('data', $addresses, __('Done.'));
    }
    
=======

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    public function store(Request $request)
    {
        $rules = [
            "city"              => "required|string",
            "district"          => "required|string",
            "street"            => "required|string",
        ];
<<<<<<< HEAD
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

=======

        $attributes = [
            "city"              => __('City'),
            "district"          => __('District'),
            "street"            => __('Street'),
        ];

        $validator = Validator::make($request->all(), $rules, attributes:$attributes);

        if ($validator->fails()) {
            return back()->with('tab', 'address')->withErrors($validator)->withInput();
        }

        $addresses = $request->user()->addresses()->count();
        if ($addresses >= 3) {
            return back()->with(['error'=> __("You can't create more than 3 Addresses"), 'tab' => 'address']);
        }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        $address = $request->user()->addresses()->create([
            "city"              => $request->city,
            "district"          => $request->district,
            "street"            => $request->street,
            "description"       => $request->description,
        ]);
<<<<<<< HEAD
        return returnData('data', $address, __('Created Successful'));

    }
=======
        return back()->with(['success'=> __('Created Successful'), 'tab' => 'address']);

    }

    public function edit(Request $request, $address)
    {
        $address = $request->user()->addresses()->findOrFail($address);
        return view('frontend.addresses.edit', compact('address'));
    }

    public function update(Request $request, $address)
    {
        $rules = [
            "city"              => "required|string",
            "district"          => "required|string",
            "street"            => "required|string",
        ];

        $attributes = [
            "city"              => __('City'),
            "district"          => __('District'),
            "street"            => __('Street'),
        ];

        $validator = Validator::make($request->all(), $rules, attributes:$attributes);

        if ($validator->fails()) {
            return back()->with('tab', 'address')->withErrors($validator)->withInput();
        }

        $address = $request->user()->addresses()->findOrFail($address);
        $address->update([
            "city"              => $request->city,
            "district"          => $request->district,
            "street"            => $request->street,
            "description"       => $request->description,
        ]);
        return redirect()->route('front.profile.index')->with(['success'=> __('Updated Successful'), 'tab' => 'address']);

    }

    public function destroy(Request $request , $address)
    {
        $address = $request->user()->addresses()->findOrFail($address);
        // $address->update(['deleted_at' => now()]);
        $address->delete();
        return back()->with(['success'=> __('Deleted Successful'), 'tab' => 'address']);
    }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
}
