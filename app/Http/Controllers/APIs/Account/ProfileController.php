<?php

namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\otp_generate;
use function App\Helpers\returnData;
<<<<<<< HEAD
use function App\Helpers\returnError;
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;
use function App\Helpers\uploadFile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // $user = $request->user();
        $data_response = new UserResource($request->user());
        return returnData('data', $data_response, __('Profile'));
    }


    public function update(Request $request)
    {
        $user = $request->user();
        $rules = [
            "name"          => "required|string|max:255",
            "email"         => "required|max:255|unique:users,email," . $user->id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

<<<<<<< HEAD
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "profile_image" => $request->profile_image ? uploadFile('profile', $request->profile_image) : 'uploads/user.png',
            "gender" => $request->gender,
        ]);
        $data_response = new UserResource($user);
        return returnData('data', $data_response, __('Profile Updated Successful'));
    }
    public function changePhone(Request $request)
    {
        $rules = [
            "new_phone"         => "required|unique:users,phone," . auth()->user()->id,
            "otp"         => "required",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $user = User::where(['new_phone' => $request->new_phone, 'otp' => $request->otp])->first();
        if (!$user) {
            return returnError('ERROR_01', __('Account Not Found'));
        }
        $user->update([
            "phone" => $user->new_phone,
        ]);
        $data_response = new UserResource($user);
        return returnData('data', $data_response, __('Profile Updated Successful'));
    }

    public function send_otp(Request $request)
    {
        $user = $request->user();
        $rules = [
            "new_phone"             => "required|unique:users,phone," . $user->id,
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }




        $user->update([
            'otp' => otp_generate(),
            'new_phone' => $request->new_phone,
        ]);

        $code = [
            "otp" => $user->otp
        ];
        return returnData('data', $code, __('Send Done'));
    }

=======
        $user->update($request->only([
            "name",
            "email",
            "phone",
            "address",
            "address2",
            "address_link",
        ]));
        $data_response = new UserResource($user);
        return returnData('data', $data_response, __('Profile Updated Successful'));
    }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

    public function delete_account(Request $request)
    {
        $user = $request->user();

        $user->update([
            "deleted_at" => now(),
        ]);
        return returnSuccessMessage(__('Deleted Successful'));
    }
}
