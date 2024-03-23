<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function __construct()
    {
        // dd(Auth::check());
        if(Auth::check() && Auth::user()->role_id == '1' ){
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return redirect()->intended(RouteServiceProvider::USER);
        }
    }
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::check() && Auth::user()->role_id == '1' ){
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            return redirect()->intended(RouteServiceProvider::USER);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
