<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->group(function () {
    // Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'getLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('index');

        Route::name('profile.')->prefix('profile')->controller(ProfileController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/update', 'update')->name('update');
        });

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);

        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
