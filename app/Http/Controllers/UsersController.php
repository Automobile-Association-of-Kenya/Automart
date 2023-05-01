<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailVerificationNotification;
use App\Models\Dealer;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->user = new User();
        $this->dealer = new Dealer();
        $this->partner = new Partner();
    }

    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list($id = null)
    {
        $query = $this->user->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $users = $query->latest()->get();

        return json_encode($users);
    }

    public function dealers($id = null)
    {
        $query = $this->dealer->query();

        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $dealers = $query->with('users')->withCount('vehicles')->latest()->get();

        return json_encode($dealers);
    }

    public function dealerCreate(Request $request)
    {
        $validated = $request->validate([
            "name" => ['nullable', 'string', 'max:100'],
            "email" => ['nullable', 'unique:dealers,email,' . $request->dealer_id, 'string', 'max:60'],
            "phone" => ['nullable', 'unique:dealers,email,' . $request->dealer_id, 'string', 'max:18'],
            "alt_phone" => ['nullable', 'string', 'max:18'],
            "address" => ['nullable', 'string', 'max:60'],
            "user_id" => ['nullable', 'exists:users,id', 'max:20'],
        ]);
        if (!is_null($request->dealer_id)) {
            $dealer = $this->dealer->find($request->dealer_id);
            $dealer->update($validated);
            $message = $request->name . " updated successfully";
        } else {
            $dealer = $this->dealer->create($validated);
            $message = $request->name . " created successfully";
        }

        if (!is_null($request->user_id)) {
            $user = $this->user->find($request->user_id);
            $user->update(['dealer_id' => $dealer->id]);
        }
        return json_encode(['status' => 'success', 'message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:60', "unique:users,email," . $request->user_id],
            'phone' => ['nullable', 'string', 'max:18', "unique:users,phone," . $request->user_id],
            'alt_phone' => ['nullable', 'string', 'max:18'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'max:20', 'string']
        ]);

        if (!is_null($request->user_id)) {
            $user = User::find($request->user_id);
            $user->update($validated);
            $message = "User updated successfully";
        } else {
            $passowrd = (!is_null($request->password)) ? Hash::make($request->password) : Hash::make(123456789);
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'alt_phone' => $request->alt_phone,
                'role' => $request->role,
                'password' => $passowrd,
            ]);
            event(new Registered($user));
            SendEmailVerificationNotification::dispatch($user)->onQueue('emails');
            $message = "Account created successfully and a verification email has been sent to your email.";
        }

        return json_encode(['status' => 'success', 'message' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function partners($id = null)
    {
        $query = $this->partner->query();

        if (!is_null($id)) {
            $query->where('id', $id);
        }

        $partners = $query->latest()->get();

        return json_encode($partners);
    }

    public function partnerCreate(Request $request)
    {
        $validated = $request->validate([
            "name" => ['nullable', 'string', 'max:100'],
            "email" => ['nullable', 'unique:partners,email,' . $request->partner_id, 'string', 'max:60'],
            "phone" => ['nullable', 'unique:partners,email,' . $request->partner_id, 'string', 'max:18'],
            "alt_phone" => ['nullable', 'string', 'max:18'],
            "address" => ['nullable', 'string', 'max:100'],
            "user_id" => ['nullable', 'exists:users,id', 'max:20'],
        ]);
        if (!is_null($request->partner_id)) {
            $partner = $this->partner->find($request->partner_id);
            $partner->update($validated);
            $message = $request->name . " updated successfully";
        } else {
            $partner = $this->partner->create($validated);
            $message = $request->name . " created successfully";
        }
        if (!is_null($request->user_id)) {
            $user = $this->user->find($request->user_id);
            $user->update(['partner_id' => $partner->id]);
        }

        return json_encode(['status' => 'success', 'message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
