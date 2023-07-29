<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('verify');
    }

    function index()
    {
        return view('profile.index');
    }

    public function update(Request $request,$id): RedirectResponse
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($request->user_id)],
            'phone' => ['required', 'max:15'],
            'alt_phone' => ['nullable', 'max:15'],
            'profile' => ['nullable','file', 'mimes:jpeg,png,jpg|max:500']
        ]);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $fileName = "";
        if ($request->hasFile("profile")) {
            $profile = $request->file('profile');
            $fileName .= uniqid() . '.' . $profile->getClientOriginalExtension();
            $profile->move("profiles/", $fileName);
        }
        $user->name = $validated["name"];
        $user->email = $validated["email"];
        $user->phone = $validated["phone"];
        $user->alt_phone = $validated["alt_phone"];
        $user->profile = $fileName;
        $user->update();

        return redirect()->back()->with('success','Profile information updated successfully');
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    function verify(EmailVerificationRequest $request)
    {
        $user = $this->user->find($request->id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($this->user()));
        }
        return redirect('/login');
    }
}
