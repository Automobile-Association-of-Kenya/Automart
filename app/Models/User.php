<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Passwords\CanResetPassword;
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
// class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,
    CanResetPassword;

    protected $fillable = [
        'dealer_id',
        'partner_id',
        'ref_no',
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

    public function summary()
    {
        $today = date('Y-m-d');
        $vehiclescount = Vehicle::count();
        $todayscount = Vehicle::whereDate('created_at', $today)->count();
        $salescount = Vehicle::where('status', 'sold')->count();
        $todaysales = Vehicle::whereDate('sold_at', $today)->count();
        $dealerscount = Dealer::count();
        $todaynewdealers = User::whereDate('created_at', $today)->count();
        $tradeinscount = Tradein::count();
        $tradeinscounttoday = Tradein::whereDate('created_at', $today)->count();
        $quotescount = Quote::count();
        $quotescounttoday = Quote::whereDate('created_at', $today)->count();
        $purchasecount = Purchase::count();
        $todaypurchasecount = Purchase::whereDate('created_at', $today)->count();
        $visitscount = Visit::count();
        $loanscount = Loan::count();
        $todayloanscount = Loan::whereDate('created_at', date('Y-m-d'))->count();
        $visitstoday = Visit::whereDate('time', date('Y-m-d'))->count();
        $activesubscriptions = DB::table('dealer_subscription')->where('expiry_date', '>', date('Y-m-d H:i:s'))->count();

        return [
            'vehiclescount' => $vehiclescount,
            'todaysvehiclecount' => $todayscount,
            'salescount' => $salescount,
            'todaysales' => $todaysales,
            'dealerscount' => $dealerscount,
            'todaynewdealers' => $todaynewdealers,
            'tradeinscount' => $tradeinscount,
            'tradeinscounttoday' => $tradeinscounttoday,
            'quotescount' => $quotescount,
            'quotescounttoday' => $quotescounttoday,
            'purchasecount' => $purchasecount,
            'todaypurchasecount' => $todaypurchasecount,
            'visitscount' => $visitscount,
            'visitstoday' => $visitstoday,
            'activesubscriptions' => $activesubscriptions,
            'loanscount' => $loanscount,
            'todayloanscount' => $todayloanscount
        ];

        // $views = ->sum('views');
        // $todayviews = count($this->todayviews());
        // $income = $this->initialize()->where('status', 'sold')->sum('price');
        // $incometoday = $this->initialize()->where('sold_at', Carbon::today())->sum('price');
        // $financescount = count($this->finances());
        // $tradeinscount = count($this->tradeins());
        // $financescounttoday = count($this->financestoday());
        // return ['vehiclescount' => $vehiclescount, 'purchasecount' => $purchasecount, 'todaysvehiclecount' => $todaysvehiclecount, 'countvehiclessold' => $countvehiclessold, 'soldtodaycount' => $soldtodaycount, 'views' => $views, 'todayviews' => $todayviews, 'income' => $income, 'incometoday' => $incometoday, 'financescount' => $financescount, 'quotescount' => $quotescount, 'tradeinscount' => $tradeinscount, 'financescounttoday' => $financescounttoday, 'quotescounttoday' => $quotescounttoday, 'tradeinscounttoday' => $tradeinscounttoday];
    }

}
