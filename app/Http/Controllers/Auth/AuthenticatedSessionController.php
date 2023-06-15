<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();
        if (auth()->user()->role === "admin") {
            $url = redirect()->intended(RouteServiceProvider::HOME);
        }else {
            $url = redirect()->intended(RouteServiceProvider::PROFILE);
        }
        return $url;
        // $intendedUrl = $request->input('intended_url', session('url.intended'));
        // return json_encode(['status' => 'success', 'message' => "Login successful.", 'url' => $intendedUrl]);
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

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(24));
            $newUser->save();

            // Log in the new user
            Auth::login($newUser);
        }

        return redirect('/home');
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists in the database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(24));
            $newUser->save();

            // Log in the new user
            Auth::login($newUser);
        }

        return redirect('/home');
    }
}
