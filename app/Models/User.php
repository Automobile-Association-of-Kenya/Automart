<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'dealer_id',
        'partner_id',
        'name',
        'email',
        'phone',
        'alt_phone',
        'role',
        'password',
        'google_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserBy($key, $value)
    {
        return $this->where("$key", "$value")->first();
    }

    /**
     * Get all of the users for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function emailAccountVerification($email)
    {
        // $mail = new Mailer();
        // $user = $this->getUserBy('email', $email);
        // return $mail->sendEMailVerificationLink($email, $user->remember_token);
    }

    public function  createPasswordReset($email, $token)
    {
        return DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }
    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'user_id', 'id');
    }

    /**
     * Get all of the sub for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'dealer_subscription', 'dealer_id', 'subscription_id')->withPivot('status', 'start_date', 'expiry_date')->wherePivot('status', 1);
    }


    function redirect()
    {
        if (auth()->user()) {
            $role = auth()->user()->role;
            if ($role === "admin") {
                return redirect()->route('admin.index');
            } elseif ($role === "partner") {
                return redirect()->route('partner.index');
            } else {
                return redirect()->route('dealer.index');
            }
        }
        return redirect()->route('login');
    }

    public function summary() {
        $vehicles = Vehicle::where('');
    }
}
