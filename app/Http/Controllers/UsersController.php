<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    public function list($id = null)
    {
        $query = $this->user->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $users = $query->latest()->get();
        return json_encode($users);
    }

    function customers() {
        $users = $this->user->with('dealer:id,name')->get();
        return json_encode($users);
    }

    // ->where('role','!=','admin')

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

    public function partners($id = null)
    {
        $query = $this->partner->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $partners = $query->with('users')->latest()->get();
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


    public function update(Request $request, string $id)
    {
        return $request;
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'max:16', 'unique:users,phone,'.$id],
            'alt_phone' => ['nullable', 'string', 'max:18'],
            'profile' => ['file', 'nullable', 'max:200']
        ]);
        $user = $this->user->find($id);
        $fileName = "";
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $fileName .= uniqid() . '.' . $profile->getClientOriginalExtension();
            $profile->move("profiles/", $fileName);
        }
        $user->update($validated()+['profile'=>$fileName]);
        return redirect()->back()->with('success','User details updated successfully');
        // return json_encode(['status'=>'success','message'=>'Your details have been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
