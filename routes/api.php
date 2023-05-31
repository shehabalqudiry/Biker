<?php

use App\Http\Controllers\APIs\Account\AddressController;
use App\Http\Controllers\APIs\HomeController;
use App\Http\Controllers\APIs\Account\AuthController;
use App\Http\Controllers\APIs\Account\CarController;
use App\Http\Controllers\APIs\Account\ProfileController;
use App\Http\Controllers\APIs\Account\WalletController;
<<<<<<< HEAD
use App\Http\Controllers\APIs\Reservations\ReservationController;
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
use App\Http\Controllers\APIs\Shipments\ShipmentController;
use App\Http\Controllers\Dashboard\AuthController as DashboardAuthController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\ReservationController as DashboardReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('send_otp', 'send_otp');
        Route::post('login', 'login');
    });

    Route::controller(HomeController::class)->group(function () {
<<<<<<< HEAD
        Route::post('contact', 'contact');
        // Route::post('createCoupon', 'createCoupon');
        // Route::get('home', 'home');
        Route::get('services', 'services');
        Route::get('colors', 'colors');
        Route::get('sizes', 'sizes');
        Route::get('cities', 'cities');
        Route::get('cars_details', 'cars_details');
        Route::get('car_brands', 'car_brands');
        Route::get('payment_methods', 'payment_methods');
        Route::get('terms', 'terms');
        Route::get('faqs', 'faqs');
        Route::get('how_work', 'how_work');
        Route::get('support', 'support');
=======
        Route::post('/contact', 'contact');
        Route::post('/createCoupon', 'createCoupon');
        Route::get('/cities', 'cities');
        Route::get('/weights', 'weights');
        Route::get('/payment_methods', 'payment_methods');
        Route::get('/terms', 'terms');
        Route::get('/support', 'support');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
    });



    Route::middleware('auth:sanctum')->group(function() {
        Route::controller(HomeController::class)->group(function () {
<<<<<<< HEAD
            Route::get('home', 'home');
            Route::post('home', 'home');
            Route::get('my_gift', 'gift');
            Route::get('notifications', 'notifications');
=======
            Route::get('/home', 'home');
        });

        Route::controller(ShipmentController::class)->group(function () {
            Route::post('/createShipment', 'createShipment');
            Route::post('/shipments_pay', 'shipments_pay');
            Route::get('/my_shipments', 'my_shipments');
            Route::get('/tracking_shipment', 'tracking_shipment');
            Route::post('/checkCoupon', 'checkCoupon');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        });

        Route::prefix('my_cars')->controller(CarController::class)->group(function () {
            Route::get('', 'index');
            Route::post('create', 'create');
            Route::post('update', 'update');
            Route::post('destroy', 'destroy');
        });

        Route::prefix('reservations')->controller(ReservationController::class)->group(function () {
            Route::get('', 'index');
            Route::post('create', 'create');
            Route::post('rate', 'rate');
            Route::post('tracking', 'tracking')->name('tracking');
            Route::post('cancel', 'cancel');
            Route::post('pay', 'pay');
            Route::post('check-coupon', 'checkCoupon');
        });


        Route::controller(AddressController::class)->group(function () {
            Route::get('/my_addresses', 'index');
            Route::post('/new_address', 'store');
            Route::post('/update_address', 'update');
            Route::post('/destroy_address', 'destroy');
        });


        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index');
            Route::post('/profile', 'update');
<<<<<<< HEAD
            Route::post('/changePhone-sendOTP', 'send_otp');
            Route::post('/changePhone', 'changePhone');
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            Route::get('/delete_account', 'delete_account');
        });

        Route::controller(WalletController::class)->group(function () {
            Route::get('/wallet', 'index');
            Route::get('/last_operations', 'last_operations');
            Route::post('/add_credit', 'add_credit');
        });

    });
});


Route::prefix('dashboard/v1')->group(function() {
    Route::controller(DashboardAuthController::class)->group(function () {
        Route::post('login', 'login');
    });

    Route::middleware('auth:admin')->group(function() {
        Route::controller(DashboardHomeController::class)->group(function () {
            Route::get('home', 'index');
            Route::post('home', 'index');
            Route::get('notifications', 'notifications');
        });

        // Route::prefix('my_cars')->controller(CarController::class)->group(function () {
        //     Route::get('', 'index');
        //     Route::post('create', 'create');
        //     Route::post('update', 'update');
        //     Route::post('destroy', 'destroy');
        // });

        Route::prefix('reservations')->controller(DashboardReservationController::class)->group(function () {
            Route::get('', 'index');
            Route::get('{id}', 'show');
            Route::post('create', 'create');
            Route::post('rate', 'rate');
            // Route::post('tracking', 'tracking')->name('tracking');
            Route::post('cancel', 'cancel');
            // Route::post('destroy', 'destroy');
        });


        Route::controller(AddressController::class)->group(function () {
            Route::get('/my_addresses', 'index');
            Route::post('/new_address', 'store');
            Route::post('/update_address', 'update');
            Route::post('/destroy_address', 'destroy');
        });


        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index');
            Route::post('/profile', 'update');
            Route::post('/changePhone-sendOTP', 'send_otp');
            Route::post('/changePhone', 'changePhone');
            Route::get('/delete_account', 'delete_account');
        });

        Route::controller(WalletController::class)->group(function () {
            Route::get('/wallet', 'index');
            Route::get('/last_operations', 'last_operations');
            Route::post('/add_credit', 'add_credit');
        });

    });
});
