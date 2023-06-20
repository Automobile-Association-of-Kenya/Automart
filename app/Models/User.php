<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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


    function redirect()
    {
        if (auth()->user()) {
            $role = auth()->user()->role;
            if ($role === "admin") {
                return redirect()->route('admin.admin');
            } elseif ($role === "partner") {
                return redirect()->route('partner.index');
            } else {
                return redirect()->route('home');
            }
        }
        return redirect()->route('login');
    }
}
