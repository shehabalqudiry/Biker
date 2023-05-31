<?php

use App\Http\Controllers\Frontend\Account\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Account\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\Frontend\HomeController;
=======
use App\Http\Controllers\Frontend\Account\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Shipments\ShipmentController;
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::name('front.')->group(function() {
            Route::controller(AuthController::class)->group(function () {
                Route::get('/register', 'getRegister')->name('auth.register');
                Route::post('/register', 'register')->name('auth.register');

                Route::get('/login', 'getLogin')->name('auth.login');
                Route::get('/send_otp', 'send_otp')->name('auth.send_otp');
                Route::post('/send_otp', 'send_otp')->name('auth.send_otp');


                Route::post('/login', 'login')->name('auth.login');
<<<<<<< HEAD
=======
                Route::post('/logout', 'logout')->middleware('auth')->name('auth.logout');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
            });

            Route::controller(HomeController::class)->group(function () {
                Route::get('/', 'home')->name('index');
                Route::get('/contact', 'get_contact_page')->name('contact');
                Route::post('/contact', 'contact')->name('contact');
<<<<<<< HEAD
                Route::get('/cities', 'cities');
                Route::get('/payment_methods', 'payment_methods');
                Route::get('/terms', 'terms');
=======
                Route::get('/about_us', 'about_us')->name('about_us');
                Route::get('/payment_methods', 'payment_methods');
                Route::get('/terms', 'terms')->name('terms');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                Route::get('/support', 'support');
            });



            Route::middleware('auth')->group(function() {

<<<<<<< HEAD
                Route::controller(ShipmentController::class)->group(function () {
                    Route::post('/createShipment', 'createShipment');
                    Route::get('/my_shipments', 'my_shipments');
                    Route::get('/tracking_shipment', 'tracking_shipment');
                    Route::post('/checkCoupon', 'checkCoupon');
=======
                Route::name('shipments.')->controller(ShipmentController::class)->group(function () {
                    Route::get('/my_shipments/{type?}', 'my_shipments')->name('index');
                    Route::get('/e_invoice/{number?}', 'e_invoice')->name('e_invoice');
                    Route::get('/create', 'create')->name('create');
                    Route::get('/pay/{shipment}', 'get_shipments_pay')->name('get_pay');
                    Route::post('/pay', 'shipments_pay')->name('pay');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/tracking_shipment/{number}', 'tracking_shipment')->name('tracking_shipment');
                    Route::post('/checkCoupon', 'checkCoupon')->name('checkCoupon');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                });

                Route::controller(AddressController::class)->group(function () {
                    Route::get('/my_addresses', 'index');
<<<<<<< HEAD
                    Route::post('/new_address', 'store');
=======
                    Route::post('/new_address', 'store')->name('address.store');
                    Route::get('/addresses/edit/{address}', 'edit')->name('addresses.edit');
                    Route::post('/addresses/update/{address}', 'update')->name('addresses.update');
                    Route::get('/addresses/destroy/{address}', 'destroy')->name('addresses.destroy');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                });


                Route::prefix('/profile')->name('profile.')->controller(ProfileController::class)->group(function () {
                    Route::get('/profile', 'index')->name('index');
<<<<<<< HEAD
                    Route::post('/profile', 'update');
=======
                    Route::post('/profile', 'update')->name('update');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                    Route::get('/delete_account', 'delete_account');
                });

                Route::controller(WalletController::class)->group(function () {
<<<<<<< HEAD
                    Route::get('/wallet', 'index');
                    Route::get('/last_operations', 'last_operations');
=======
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
                    Route::post('/add_credit', 'add_credit');
                });

            });
        });
    });



