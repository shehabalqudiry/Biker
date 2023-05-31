<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Http\Resources\Dashboard\ReservationResource;
use App\Http\Resources\UserResource;
use App\Models\Reservation;
=======
use App\Http\Resources\UserResource;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\otp_generate;
use function App\Helpers\returnData;
use function App\Helpers\returnError;
use function App\Helpers\returnValidationError;

class HomeController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
        $reservations = Reservation::where(function($q) use ($request) {
            if ($request->month) {
                $q->whereMonth('created_at', $request->month);
            }
        })->get();
        $data = [
            'reservations_count' => $reservations->count(),
            'reservations_current' => $reservations->whereIn("status", [0,1,2,3])->count(),
            'reservations_previous' => $reservations->where("status", 4)->count(),
            'payments' => number_format($reservations->whereIn("status", [0,1,2,3])->sum('total'), 2),
            'reservations' => ReservationResource::collection($reservations),
        ];
        return returnData('data', $data, __('Login Done'));
=======
        return view('admin.index');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }
}
