<?php

namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\otp_generate;
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            "name"          => "required|string|max:255",
            "phone"         => "required|max:255|unique:users,phone",
            "fcm_token"     => "nullable",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $data = [
            'name'      => $request->name,
            'phone'     => $request->phone,
            'otp'       => otp_generate(),
            'number'    => "CARGO" . otp_generate(),
        ];

        $user = User::create($data);

        $user->api_token = $user->createToken($request->ip())->plainTextToken;

        $data_response = $user;

        return returnData('data', $data_response, __('Register Done'));
    }


    public function send_otp(Request $request)
    {
        $rules = [
            "phone"             => "required|exists:users,phone",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }


        $user = User::where('phone', $request->phone)->first();

        if (!$user || !$user->otp) {
            return returnError('ERROR_01', __('Register failed'));
        }
        if ($user->deleted_at !== null) {
            return returnError('ERROR_01', __('Account Deleted'));
        }

        $user->update([
            'otp' => otp_generate(),
        ]);
        $code = [
            "otp" => $user->otp
        ];
        return returnData('data', $code, __('Send Done'));
    }

    public function login(Request $request)
    {
        $rules = [
            "phone"             => "required",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }



        $user = User::where('phone', $request->phone)->first();


        if (!$user) {
<<<<<<< HEAD
            $rules = [
                "name"          => "required|string|max:255",
                "phone"         => "required|max:255|unique:users,phone",
                "email"         => "nullable|max:255|unique:users,email",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return returnValidationError("N/A", $validator);
            }

            $data = [
                'name'      => $request->name,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'otp'       => otp_generate(),
                'fcm_token'       => $request->fcm_token,
=======
            $data = [
                'name'      => $request->name,
                'phone'     => $request->phone,
                'otp'       => otp_generate(),
                'number'    => "CARGO" . otp_generate(),
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            ];

            $user = User::create($data);

<<<<<<< HEAD
            $user->api_token = $user->createToken($request->ip())->plainTextToken;

            $user->wallet()->create([
                'user_id' => $user->id
            ]);

            $data_response = $user;

            return returnData('data', $data_response, __('Register Done'));
        }
        if (!$user->wallet()) {
            $user->wallet()->create([
                'user_id' => $user->id
            ]);
        }

        $user->update(['fcm_token'       => $request->fcm_token]);

        if ($user->deleted_at != null) {
            return returnError('ERROR_01', __('Account Deleted'));
        }

        $user->wallet()->firstOrCreate([
            'user_id' => $user->id
        ]);

=======
            $user->wallet()->create([
                'user_id' => $user->id
            ]);
            $user->api_token = $user->createToken($request->ip())->plainTextToken;

            $data_response = new UserResource($user);

            return returnData('data', $data_response, __('Register Done'));
        }
        if ($user->deleted_at != null) {
            return returnError('ERROR_01', __('Account Deleted'));
        }

        if(!$user->wallet){
            $user->wallet()->create([
                'user_id' => $user->id
            ]);
        }

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

        if ($request->otp and $user->otp != $request->otp) {
            return returnError('ERROR_02', __('OTP failed'));
        }

        $user->api_token = $user->createToken($request->ip())->plainTextToken;

        $data_response = new UserResource($user);
        return returnData('data', $data_response, __('Login Done'));
    }
}
