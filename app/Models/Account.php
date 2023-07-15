<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['provider', 'pp_client_id', 'pp_client_secret', 'pp_business_name', 'pp_card_number', 'pp_expiry', 'pp_cw', 'mpesa_secret', 'mpesa_customer_key', 'mpesa_pass_key', 'mpesa_business_short_code', 'mpesa_transaction_type', 'currency'];

    public function getfortransaction($type = null, $subscription_id = null)
    {
        $query = $this->query();
        if (!is_null($subscription_id)) {
            $query->where('subscription_id', $subscription_id);
        }
        $account = $query->where('active', 1)->first();
        return (!is_null($account)) ? $account : $this->where('provider', $type)->where('active', 1)->first();
    }
    
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'account_id', 'id');
    }

}
