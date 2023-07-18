<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailVerificationNotification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:16', 'unique:' . User::class],
            'alt_phone' => ['nullable', 'string', 'max:18'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::latest()->first();
        $ref_no = (!is_null($user)) ? strtotime(now()) . '-' . $user->id + 1 : strtotime(now()) . '-1';
        $user = User::create([
            'ref_no' => $ref_no,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'alt_phone' => $request->alt_phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return json_encode(['status' => 'success', 'message' => 'Account created successfully and a verification email has been sent to your email.']);
    }
}
