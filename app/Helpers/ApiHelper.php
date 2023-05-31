<?php


namespace App\Helpers;

<<<<<<< HEAD
use App\Models\Reservation;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
=======
use App\Models\Setting;
use App\Models\Shipment;
use App\Models\User;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

function distance($lat1, $lon1, $lat2, $lon2) {
    // $lat1 = floatval($lat1);
    // $lon1 = floatval($lon1);
    // $lat2 = floatval($lat2);
    // $lon2 = floatval($lon2);
    $radius = 6371; // Earth's radius in kilometers
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $distance = $radius * $c; // Distance in kilometers
    return number_format($distance, 2);
}

function returnError($errNum, $msg, $status = false)
{
    return response()->json([
        'status' => $status,
        'errNum' => $errNum,
        'msg' => $msg
    ]);
}

function otp_generate()
{
    $number = mt_rand(1000, 9999);
    if (User::where('otp', $number)->exists() or User::where('number', "CARGO" . $number)->exists()) {
        otp_generate();
    }
    return $number;
}


function reservation_number()
{
    $number = str_pad(Reservation::latest()->count() + 1, 4, '0', STR_PAD_LEFT);

    return $number;
}


function returnSuccessMessage($msg = "", $errNum = "S000", $status = true)
{
    return [
        'status' => $status,
        'errNum' => $errNum,
        'msg' => $msg
    ];
}

function returnData($key, $value, $msg = "", $status = true)
{
    return response()->json([
        'status' => $status,
        'errNum' => "S000",
        'msg' => $msg,
        $key => $value
    ]);
}

function returnValidationError($code = "N/A", $validator = null)
{
    return returnError($code, $validator->errors()->first());
}

function settings()
{
    return Setting::first();
}

<<<<<<< HEAD
function notify_user(
    $options=[]) {
    $options = array_merge([
        'content'=>[$options['message'] ?? ""],
        'action_url'=>$options['url'] ?? "",
        'methods'=>['database'],
        'image'=>$options['image'] ?? "",
        'btn_text'=>"عرض الإشعار"
    ], $options);
    $user = User::where('id', $options['user_id'])->first();
    if ($user!=null) {
        User::where('email', $user->email)->first()->notify(
            new \App\Notifications\GeneralNotification([
                'content'=>$options['content'],
                'action_url'=>$options['action_url'],
                'btn_text'=>$options['btn_text'],
                'methods'=>$options['methods'],
                'image'=>$options['image']
            ])
        );
    }
    if (request()->user()->fcm_token) {
        sendmessage(request()->user()->fcm_token, "اشعار جديد", $options['content']);
    }
}


function uploadFile($folder, $file, $prefix = "")
{
    //$file->store( $folder);
    $filename = "biker_" . $prefix . date('d_m_Y_h_i_s') . '.' . $file->getClientOriginalExtension();
    $path2 = public_path("uploads/".$folder);
    $file->move($path2, $filename);
    $path = 'uploads/' . $folder . '/' . $filename;
    return $path;
}

function deleteFile($table, $id, $column)
{
    $img = DB::table($table)->where('id', $id)->first();
    File::delete($img->$column);
    return ;
}


function sendmessage($token, $title, $body)
{
    $token = $token;
    $from = "AAAA5-lTX3w:APA91bEi-gFC3UIlZBI5pq5JQVB6GE8Hmf8uGr3FiqIACLk2d9xH80fuGWSgHOtPOPWlHQzp7GhX6ANsfBsmdSgaOxpcka_geOPRwuE2a3MEVwXOLMLinFPGQYWLOnYb_g5QB3w5bLZ1";
    $msg = array(
            'body'     => $body,
            'title'    => $title,
            'receiver' => 'erw',
            'icon'     => "https://salon-eljoker.com/images/joker.jpg",/*Default Icon*/
            'vibrate'	=> 1,
            'sound'		=> "http://commondatastorage.googleapis.com/codeskulptor-demos/DDR_assets/Kangaroo_MusiQue_-_The_Neverwritten_Role_Playing_Game.mp3",
            );

    $fields = array(
                'to'        => $token,
                'notification'  => $msg
            );

    $headers = array(
                'Authorization: key=' . $from,
                'Content-Type: application/json'
            );
    //#Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
