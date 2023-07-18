<?php

namespace App\Models;

use App\Events\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'dealer_id', 'subscription_id', 'account_id', 'name', 'phone', 'trans_id', 'crid', 'mrid', 'amount', 'trans_time', 'org_balance', 'complete', 'completed_at'];

    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function initiatempesa($account, $subscription, $dealer_id = null, $phone)
    {
        $url = env('MPESA_PROCESS_URL');
        $access_token = '';
        $consumer_secret = $account->mpesa_secret;
        $consumer_key = $account->mpesa_customer_key;
        // $consumer_secret = 'KEPgfS1AbNtQeRaL';
        // $consumer_key = '9u589pJDEzppBPkYbKeYvvrtGGYPtb5F';
        $encodestring = base64_encode($consumer_key . ":" . $consumer_secret);
        $OuathString = 'Basic ' . $encodestring;

        $oauthURL = env('MPESA_OAUTH_URL');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $oauthURL);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $encodestring)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $json = json_decode($curl_response, true);
        Log::notice($json);
        $access_token = $json['access_token'];
        $passkey = $account->mpesa_pass_key;
        $timestamp = '30' . date("ymdhis");
        $password = base64_encode($account->mpesa_business_short_code . $passkey . $timestamp);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header
        $curl_post_data = array(
            'BusinessShortCode' => $account->mpesa_business_short_code,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => $phone,
            'PartyB' => $account->mpesa_business_short_code,
            'PhoneNumber' => $phone,
            'CallBackURL' => env("MPESA_CALLBACK_URL"),
            'AccountReference' => auth()->id().'SUB'.date(date("ymdhis")),
            'TransactionDesc' => $subscription->name.' Subscription payment - ' . date("F")
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        Log::notice($curl_response);
        $data = json_decode($curl_response, true);
        if (isset($data["ResponseCode"]) && $data["ResponseCode"] == 0) {
            $this->create([
                'user_id' => auth()->id(),
                'dealer_id' => $dealer_id,
                'subscription_id' => $subscription->id,
                'account_id' => $account->id,
                'phone' => $phone,
                'crid' => $data["CheckoutRequestID"],
                'mrid' => $data["MerchantRequestID"],
                'amount' => $subscription->amount,
                'trans_time' => now(),
            ]);
            return json_encode(['status' => 'success',  'checkoutid' => $data["CheckoutRequestID"], 'message' => $data["CustomerMessage"] . ". Check your phone and enter Mpesa pin to proceed."]);
        } else {
            return json_encode(['status' => 'error', 'message' => $data]);
        }
    }

    public function confirm($checkOutId, $trans_id, $phonenumber, $amount, $completed_at)
    {
        $payment = $this->where('crid', $checkOutId)->first();
        if (!is_null($payment)) {
            $payment->update(['trans_id' => $trans_id, 'phone' => $phonenumber, 'amount' => $amount, 'complete' => 1, 'completed_at' => $completed_at]);
            event(new Subscription(auth()->user(), $payment));
        }
    }

    public function initiatepaypal($account, $subscription)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $account->currency,
                        "value" => $subscription->cost
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return json_encode(['status' => 'success', 'url' => $links['href'], 'message' => $links["message"]]);
                }
            }
            return json_encode(['status' => 'error', 'message' => $response['message']  ?? "Error occured during processing. Please try again later. "]);
        } else {
            return json_encode(['status' => 'error', 'message' => $response['message'] ?? "Error occured during processing. Please try again later. "]);
        }
    }
}
