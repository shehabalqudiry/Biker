<?php

<<<<<<< HEAD
namespace App\Http\Controllers\APIs\Account;
=======
namespace App\Http\Controllers\Frontend\Account;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class WalletController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request)
    {
        if (!$request->user()->wallet()) {
            $request->user()->wallet()->create([
                'user_id' => $request->user()->id,
            ]);
        }
        $data['balance'] = $request->user()->wallet->balance ?? "0";
        $data['last_operations'] = Payment::where('wallet_id', $request->user()->wallet->id)->latest()->get() ?? [];

        return returnData('data', $data, __('Done.'));
    }

    public function last_operations(Request $request)
    {
        $data = $request->user()->wallet();

        return returnData('data', $data, __('Done.'));
    }
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

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


        $data = $request->user()->wallet;
<<<<<<< HEAD
        
=======

>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        $data->payments()->create([
            "value"             => $request->value,
            "type"              => 1,
            "user_id"           => $request->user()->id,
            "payment_method_id" => $request->payment_method_id,
            "description"       => $request->description,
        ]);
<<<<<<< HEAD
        return returnSuccessMessage(__('Payment Successful'));
=======
        return back()->with('success',__('Payment Successful'));
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    }
}
