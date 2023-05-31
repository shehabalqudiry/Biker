<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use function App\Helpers\otp_generate;
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;

class AuthController extends Controller
{
    public function getRegister(Request $request)
    {
        return view('frontend.auth.register');
    }

    public function getLogin(Request $request)
    {
        return view('frontend.auth.login');
    }


    public function register(Request $request)
    {
        $rules = [
            "name"          => "required|string|max:255",
            "phone"         => "required|max:255|unique:users,phone",
            "fcm_token"     => "nullable",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
=======
            return back()->withErrors($validator)->withInput();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        }

        $data = [
            'name'      => $request->name,
            'phone'     => $request->phone,
            'password'  => $request->password ? Hash::make($request->password) : null,
            'otp'       => otp_generate(),
        ];

        $user = User::create($data);

        $user->api_token = $user->createToken($request->ip())->plainTextToken;

        $data_response = new UserResource($user);

        return returnData('data', $data_response, __('Register Done'));
    }


    public function login(Request $request)
    {
        $rules = [
            "phone"             => "required",
            "otp1"               => "required|string",
            "otp2"               => "required|string",
            "otp3"               => "required|string",
            "otp4"               => "required|string",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $otp = $request->otp1 . $request->otp2 .$request->otp3 . $request->otp4;

        $user = User::where('phone', $request->phone)->first();


        // if (!$user) {
        //     $data = [
        //         'name'      => $request->name,
        //         'phone'     => $request->phone,
        //         'otp'       => otp_generate(),
        //     ];

        //     $user = User::create($data);

        //     $login = Auth::loginUsingId($user);

        //     return returnData('data', $data_response, __('Register Done'));
        // }
        if ($user->deleted_at !== null) {
            return back()->withErrors([__('Account Deleted')]);
        }
        if ($user->otp != $otp) {
            return back()->withErrors([__('OTP failed')]);
        }
        $login = Auth::loginUsingId($user->id);

        if ($login) {
            return to_route('front.index')->with('success', __('Login Done'));
        }else{
            return back()->withErrors([__('Register failed')]);
        }

    }



    public function send_otp(Request $request)
    {
        $rules = [
<<<<<<< HEAD
            "phone"             => "required|exists:users,phone",
=======
            "phone"             => "required",
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
=======
            return back()->withErrors($validator)->withInput();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        }


        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
<<<<<<< HEAD
            return returnError('ERROR_01', __('Register failed'));
        }

        if ($user->deleted_at !== null) {
            return returnError('ERROR_01', __('Account Deleted'));
=======
            $data = [
                'name'      => $request->name,
                'phone'     => $request->phone,
                'otp'       => otp_generate(),
                'number'    => "CARGO" . otp_generate(),
            ];

            $user = User::create($data);

            $user->wallet()->create([
                'user_id' => $user->id
            ]);
            // return back()->with('error', __('Register failed'));
        }

        if ($user->deleted_at !== null) {
            return back()->with('error', __('Account Deleted'));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        }

        $user->update([
            'otp' => otp_generate(),
        ]);
        $phone = $request->phone;
<<<<<<< HEAD

        return view('frontend.auth.otp', compact('phone'))->with('success', __('Send Done'));
=======
        $otp = $user->otp;

        return view('frontend.auth.otp', compact('phone', 'otp'))->with('success', __('Send Done'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return to_route('front.index');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }

}
