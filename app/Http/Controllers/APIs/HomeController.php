<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\ShipmentResource;
<<<<<<< HEAD
use App\Models\Car;
use App\Models\City;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\HowWork;
use App\Models\PaymentMethod;
use App\Models\Reservation;
use App\Models\Service;
=======
use App\Models\City;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\PaymentMethod;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use App\Models\Setting;
use App\Models\Shipment;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Term;
use App\Models\Weight;
<<<<<<< HEAD
use Carbon\Carbon;
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function App\Helpers\returnData;
use function App\Helpers\returnSuccessMessage;
use function App\Helpers\returnValidationError;

class HomeController extends Controller
{
    public function home(Request $request)
    {
<<<<<<< HEAD
        $data = [
            'cities' => City::where('status', 1)->get(),
=======
        $sliders = Slider::latest()->get();
        $latest_shipments = Shipment::where('user_id', $request->user()->id)->latest()->take(4)->get();
        $data = [
            'sliders'                           => $sliders,
            'latest_shipments'                  => ShipmentResource::collection($latest_shipments),
            'total_shipments'                   => Shipment::where('user_id', $request->user()->id)->count(),
            'on_the_way_shipments'              => Shipment::where('user_id', $request->user()->id)->where('status', 1)->count(),
            'received_shipments'                => Shipment::where('shipment_consignee_id', $request->user()->number)->where('status', 1)->count(),
            'delivered_shipments'               => Shipment::where('user_id', $request->user()->id)->where('status', 2)->count(),
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        ];

        if (auth()->check()) {
            $data['my_cars'] = CarResource::collection(auth()->user()->cars()->get());
        }
        if ($request->lat and $request->long) {
            $city = City::where('status', 1)->where([['lat', '>=', $request->lat], ['long', '<=', $request->long]])->first();
            if (!$city) {
                return returnData('data', $data, "هذه المنطقة خارج نطلق خدمتنا,سوف نصل أليك قريباً");
            }
        }
        return returnData('data', $data, __('Done.'));
    }

<<<<<<< HEAD
    public function gift(Request $request)
    {
        $star = 0;
        $user = $request->user();
        if ($user->gift_was_used_in != null) {
            $reservations_count = $request->user()->reservations()->whereBetween('created_at', [$user->gift_was_used_in, Carbon::now()])->where('status', 4)->count();
            if ($reservations_count >= 5) {
                $star = 5;
            }else {
                $star = $reservations_count;
            }
        }else {
            $reservations_count = $request->user()->reservations()->where('status', 4)->count();
            if ($reservations_count >= 5) {
                $star = 5;
            }else {
                $star = $reservations_count;
            }
        }
        $data = [
            'star_num' => $star,
        ];

        return returnData('data', $data, __('Done.'));
    }

    public function services(Request $request)
    {
        $data['main_services'] = Service::where('type', 1)->get();
        $data['optional_services'] = Service::where('type', 2)->get();
        return returnData('data', $data, __('Done.'));
    }

    public function how_work(Request $request)
    {
        $data = HowWork::get();
        return returnData('data', $data, __('Done.'));
    }


    public function notifications(Request $request)
    {
        $notifications = $request->user()->notifications()->get();
        if ($request->deleteNotifications == 'all') {
            foreach ($notifications as $notification) {
                $notification->markAsRead();
            }
            // $notifications = $notifications;
        }

        if ($request->deleteNotifications !== 'all' and $request->deleteNotifications !== null) {
            $notifications->where('id', $request->deleteNotifications)->markAsRead();
            // $notifications = $notifications;
        }
        $unreadNotifications = $request->user()->unreadNotifications()->count();
        $data = [
            'notifications' => NotificationResource::collection($notifications),
            'unreadNotifications' => $unreadNotifications,
        ];
        return returnData('data', $data, "الاشعارات");
    }

    public function colors(Request $request)
    {
        $data = Color::get();
        return returnData('data', $data, __('Done.'));
    }

    public function cars_details(Request $request)
    {
        $data['colors'] = Color::get();
        $data['sizes'] = Size::get();
        $data['car_brands'] = Car::with('models')->orderBy('arrange', 'asc')->get();
        return returnData('data', $data, __('Done.'));
    }

    public function sizes(Request $request)
    {
        $data = Size::get();
        return returnData('data', $data, __('Done.'));
    }

=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    public function cities(Request $request)
    {
        $data = City::where('status', 1)->get();
        return returnData('data', $data, __('Done.'));
    }

<<<<<<< HEAD
    // public function createCoupon(Request $request)
    // {
    //     Coupon::create([
    //         "coupon_code" => $request->coupon_code,
    //         "value" => $request->coupon_value,
    //         "number" => 10,
    //     ]);

    //     $data = Coupon::get();
    //     return returnData('data', $data, __('Done.'));
    // }

    public function car_brands(Request $request)
    {
        $data = Car::with('models')->get();
=======
    public function createCoupon(Request $request)
    {
        Coupon::create([
            "coupon_code" => $request->coupon_code,
            "value" => $request->coupon_value,
            "number" => 10,
        ]);

        $data = Coupon::get();
        return returnData('data', $data, __('Done.'));
    }
    public function weights(Request $request)
    {
        $data = Weight::get();
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        return returnData('data', $data, __('Done.'));
    }

    public function payment_methods(Request $request)
    {
        $data = PaymentMethod::where('status', 1)->get();
        return returnData('data', $data, __('Done.'));
    }

    public function terms(Request $request)
    {
        $data = Term::where('status', 1)->get();
<<<<<<< HEAD

        return returnData('data', $data, __('Done.'));
    }

    public function faqs(Request $request)
    {
        $data = Faq::get();
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        return returnData('data', $data, __('Done.'));
    }

    public function support(Request $request)
    {
        $setting = Setting::first();
        $data = [];
        if ($setting) {
            $data = [
                'whatsapp' => $setting->whatsapp,
                'twitter' => $setting->twitter,
<<<<<<< HEAD
                'instagram' => $setting->instagram,
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                'phone' => $setting->phone,
                'email' => $setting->email,
                'google_play_url' => $setting->google_play_url,
                'app_store_url' => $setting->app_store_url,
<<<<<<< HEAD
                'support_image' => $setting->support_image,
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            ];
        }
        return returnData('data', $data, __('Done.'));
    }

    public function contact(Request $request)
    {
        $rules = [
            "name"                      => "required|string",
            "phone"                     => "required|string",
            "email"                     => "nullable|string|email",
            "subject"                   => "required|string",
            "message"                   => "required|string",
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return returnValidationError("N/A", $validator);
        }

        $data = [
            "name"                      => $request->name,
            "phone"                     => $request->phone,
            "email"                     => $request->email,
            "subject"                   => $request->subject,
            "msg"                       => $request->message,
        ];

        Contact::create($data);

        return returnSuccessMessage(__('Send Done'));
    }
}
