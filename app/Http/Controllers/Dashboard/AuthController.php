<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Http\Resources\Dashboard\AdminResource;
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

<<<<<<< HEAD
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $rules = [
            "email"             => "required|string|email|exists:admins,email",
=======

class AuthController extends Controller
{
    public function getLogin(Request $request)
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $rules = [
            "email"             => "required|string",
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            "password"          => "required|string",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
<<<<<<< HEAD
            return returnValidationError("N/A", $validator);
        }

        if (!auth('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return returnError('ERROR_02', 'البيانات غير موجودة');
        }
        $admin = auth('admin')->user();

        // if (!Hash::check($request->password, $admin->password)) {
        //     return returnError('ERROR_02', 'كلمة المرور خاطئة');
        // }
        $admin->api_token = $admin->createToken($request->ip())->plainTextToken;

        $data_response = new AdminResource($admin);
        return returnData('data', $data_response, 'تم تسجيل الدخول بنجاح');
=======
            return back()->withErrors($validator)->withInput();
        }
        $login = auth('admin')->attempt($request->only('email', 'password'), $request->remember ? true : false);

        if(!$login){
            return back()->withErrors(__('Register failed'));
        }

        return to_route('admin.index');

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }

    public function register(Request $request)
    {
        $admin = Admin::create([
            'name'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password'),
        ]);
        if (!$admin) {
            return "Done";
        }
        return to_route('admin.login');
    }
}
