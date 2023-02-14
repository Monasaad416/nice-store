<?php

namespace App\Http\Controllers\Front\Auth\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginClientRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.client.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginClientRequest $request): RedirectResponse
    {
        $request->authenticate('client');

        $request->session()->regenerate();

        return redirect()->route('front.client.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.login');
    }
}
