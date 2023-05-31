<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

use function App\Helpers\returnError;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!$request->expectsJson()) {
            // dd($request);
            if($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }
            // return returnError("LOGIN00", __('Unauthorized'));
<<<<<<< HEAD
            return route('front.login');
=======
            return route('front.auth.login');
>>>>>>> 19029a37273b66b78e30daff89e1f9cb138eee7e
        }
        return null;
    }
}
