<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (Auth::guard()->check() && Auth::user()->role_id == '1' ) { // Admin
            return redirect(RouteServiceProvider::HOME);
        }elseif(Auth::guard()->check() && Auth::user()->role_id == '2'){ // user
            return redirect(RouteServiceProvider::USER);
        }
        return $request->expectsJson() ? null : route('login');
    }
}
