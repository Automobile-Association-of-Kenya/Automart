<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function signup(Request $request)
    {
        $this->user->register($request->name, $request->email, $request->phone, $request->role??null, $request->password);
        $this->user->emailAccountVerification($request->email);
        return json_encode(['status'=>'success', 'message'=> 'Account created successfully and an email has been sent to you for confirmation']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);
        $user = $this->user->getUserBy('email', $credentials["email"]);
        if (!is_null($user->email_verified_at)) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                if (Auth::user()->name == '') {
                    $request->session()->put('user', Auth::user());
                } else {
                    $request->session()->put('user', Auth::user());
                }
                return json_encode(['status'=>'success', 'user'=>Auth::user()]);
            }else {
                return json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
            }
        } else {
            return json_encode(['status'=>'error', 'message'=> 'Email is not verified. Please check the email we sent you and verify your email to proceed']);
        }
    }
}
