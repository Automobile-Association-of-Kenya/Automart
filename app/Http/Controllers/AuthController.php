<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\CarMake;
use App\Models\Caronsells;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $user;
    protected $mailer;

    public function __construct()
    {
        $this->user = new User();
        $this->mailer = new Mailer();
    }

    public function register()
    {
        return view('auth.register');
    }


    public function registerUser(UserRequest $request)
    {
        $user = $this->user->register($request->name, $request->email, $request->phone, $request->password);
        $this->user->emailAccountVerification($request->email);
        return redirect('login')->with('success', 'Account created successfully and an email has been sent to you for confirmation');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);
        $user = $this->user->getUserBy('email', $credentials["email"]);
        // if (!is_null($user->email_verified_at)) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->name == '') {
                    $request->session()->put('user', Auth::user());
                    return view('buyer');
                } else {
                    $request->session()->put('user', Auth::user());
                    return redirect()->route('home');
                }
            }
        // } else {
            return back()->withErrors('Email is not verified. Please check the email we sent you and verify your email to proceed');
        // }
        return back()->withErrors('Invalid email or password.');
    }


    public function passwordReset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);
        $user = $this->user->where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('login')->with('success', 'Password reset was successful');
    }


    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function forget(Request $request)
    {
        $mail = new Mailer();
        $email = $request->email;
        $user = $this->user->getUserBy('email', $email);
        if (!is_null($user)) {
            $token = Str::random(20);
            $this->user->createPasswordReset($email, $token);
            $mail->sendPasswordRecoveryEmail($email, $token);
        } else {
            return back()->withErrors('email', 'User with that email address does not exist');
        }
        return redirect()->back()->with('success', 'Password reset link has been sent to your email. Click on the link and create a new password');
    }

    public function reset($token)
    {
        $reset = PasswordReset::where('token', $token)->first();
        return view('auth.reset', ['reset' => $reset]);
    }



    public function sendResetLinkEmail($email)
    {

        $response = Password::sendResetLink(['email' => $email]);

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verify($token)
    {
        $user = $this->user->getUserBy('remember_token', $token);
        if (!is_null($user)) {
            $user->update(['email_verified_at' => now()]);
            return redirect('login')->with('success', 'Email verified successfully.');
        }
        return redirect('/')->withErrors('error', 'Invalid token found.');
    }
}
