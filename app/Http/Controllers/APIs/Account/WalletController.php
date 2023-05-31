<?php

namespace App\Http\Controllers\APIs\Account;

use App\Http\Controllers\Controller;
use App\Models\Payment;
<<<<<<< HEAD
=======
use App\Models\User;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class WalletController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
        $wallet = $request->user()->wallet()->firstOrCreate([
            'user_id' => $request->user()->id,
        ]);

        $data['balance'] = $request->user()->wallet->balance ?? "0";
        $data['last_operations'] = $wallet->payments()->latest()->get() ?? [];
=======
        if (!$request->user()->wallet) {
            $request->user()->wallet()->create([
                'user_id' => $request->user()->id,
            ]);
        }
        $data['balance'] = "0";
        $data['last_operations'] = [];
        if ($request->user()->wallet) {
            $data['balance'] = $request->user()->wallet->balance ?? "0";
            $data['last_operations'] = Payment::where('wallet_id', $request->user()->wallet->id)->latest()->get() ?? [];
        }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

        return returnData('data', $data, __('Done.'));
    }

    public function last_operations(Request $request)
    {
        $data = $request->user()->wallet();

        return returnData('data', $data, __('Done.'));
    }

    public function add_credit(Request $request)
    {
        $rules = [
            "value"                              => "required",
            "payment_method_id"                  => "required|exists:payment_methods,id",
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

<<<<<<< HEAD
=======
        // foreach (User::get() as $value) {
        //     if (!$value->wallet) {
        //         $value->wallet()->create([
        //             'user_id' => $value->id
        //         ]);
        //     }
        // }
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

        $data = $request->user()->wallet;

        $data->payments()->create([
            "value"             => $request->value,
            "type"              => 1,
<<<<<<< HEAD
=======
            "user_id"           => $request->user()->id,
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            "payment_method_id" => $request->payment_method_id,
            "description"       => $request->description,
        ]);
        return returnSuccessMessage(__('Payment Successful'));
    }
}
