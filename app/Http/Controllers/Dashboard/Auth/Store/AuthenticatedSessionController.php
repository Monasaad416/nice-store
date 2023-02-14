<?php

namespace App\Http\Controllers\Dashboard\Auth\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginStoreRequest;
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
        return view('auth.store.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginStoreRequest $request): RedirectResponse
    {
        $request->authenticate('store');

        $request->session()->regenerate();

        return redirect()->route('store.dashboard.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('store')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('store.login');
    }
}
