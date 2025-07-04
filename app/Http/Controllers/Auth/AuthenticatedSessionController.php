<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Activity;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        Activity::create([
            'user_id' => auth()->id(),
            'action' => 'login',
            'description' => 'User logged in successfully.'
        ]);
        $user = auth()->user();
        if ($user && !in_array($user->email, ['admin@gmail.com', 'user@gmail.com'])) {
            if ($user->hasVerifiedEmail()) {
                $user->forceFill([
                    'email_verified_at' => null,
                ])->save();

                $user->sendEmailVerificationNotification();

                return redirect()->route('verification.notice');
            }
        }
        return redirect()->intended(route('dashboard', absolute: false));
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
