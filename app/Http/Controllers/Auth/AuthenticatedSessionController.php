<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Error;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
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
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->where('status', 0)
                ->update(['status' => 1, 'message' => 'success']);
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Login successful');
        } else {
            DB::table('users')
                ->where('email', $request->email)
                ->where('status', 0)
                ->update(['message' => 'fail']);
        }
        return back()->with('loginError', 'Please check your email or password');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->regenerateToken();

        if ($request->session()->invalidate()) {
            DB::table('users')
                ->where('status', 1)
                ->update(['status' => 0, 'message' => '']);
        }

        return redirect('/');
    }
}
