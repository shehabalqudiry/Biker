<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $user = auth('admin')->user();

        return view('admin.profile.index', compact('user'));
    }


    public function update(Request $request)
    {
        $user = auth('admin')->user();
        $rules = [
            "name"          => "required|string",
            "email"         => "required|string",
            "phone"         => "required|string",
            "password"      => "nullable|min:8",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $user->update([
            "name"          => $request->name,
            "email"         => $request->emil,
            "phone"         => $request->phone,
            "password"      => Hash::make($request->password),
        ]);
        return returnData('data', $data_response, __('Profile Updated Successful'));
    }

}
