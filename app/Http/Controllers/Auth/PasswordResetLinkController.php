<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notification\Mailer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email','exists:users,email'],
        ]);

        // // We will send the password reset link to this user. Once we have attempted
        // // to send the link, we will examine the response then see the message we
        // // need to show to the user. Finally, we'll send out a proper response.
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        // $mail = new Mailer();
        // $email = $request->email;
        // $user = $this->user->getUserBy('email', $email);
        // if (!is_null($user)) {
        //     $token = Str::random(20);
        //     $this->user->createPasswordReset($email, $token);
        //     $mail->sendPasswordRecoveryEmail($email, $token);
        // } else {
        //     return back()->withErrors('email', 'User with that email address does not exist');
        // }
        // return redirect()->back()->with('success', 'Password reset link has been sent to your email. Click on the link and create a new password');

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            $val = "success";
            $message = "Request success. A password reset link has been sent to your email. Please click the link to reset your password";
        }else {
            $val = "error";
            $message = __($status);
        }
        return json_encode(['status' => $status, 'message' => $message]);
    }
}
