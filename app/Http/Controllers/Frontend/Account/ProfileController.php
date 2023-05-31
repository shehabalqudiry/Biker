<?php

<<<<<<< HEAD
namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
=======
namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Payment;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // $user = $request->user();
<<<<<<< HEAD
        $data_response = new UserResource($request->user());
        return returnData('data', $data_response, __('Profile'));
=======
        $data['info'] = $request->user();
        $data['addresses'] = $request->user()->addresses()->latest()->get();

        $data['balance'] = $request->user()->wallet->balance ?? "0";
        $data['last_operations'] = Payment::where('wallet_id', $request->user()->wallet->id)->latest()->get();
        return view('frontend.profile.index', compact('data'));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }


    public function update(Request $request)
    {
        $user = $request->user();
        $rules = [
            "name"          => "required|string|max:255",
<<<<<<< HEAD
            "phone"         => "required|max:255|unique:users,phone," . $user->id,
=======
            "phone"         => "required|string|max:255",
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
=======
            return back()->with('tab', 'account')->withErrors($validator)->withInput();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        }

        $user->update($request->only([
            "name",
            "email",
            "phone",
            "address",
            "address2",
            "address_link",
        ]));
<<<<<<< HEAD
        $data_response = new UserResource($user);
        return returnData('data', $data_response, __('Profile Updated Successful'));
=======
        return back()->with('success', __('Profile Updated Successful'));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }

    public function delete_account(Request $request)
    {
        $user = $request->user();

        $user->update($request->only([
            "deleted_at" => now(),
        ]));
        return returnSuccessMessage(__('Deleted Successful'));
    }
}
