<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'dealer_id', 'subscription_id', 'account_id', 'name', 'phone', 'trans_id', 'crid', 'mrid', 'amount', 'trans_time', 'org_balance', 'complete', 'completed_at'];

    public function initiatempesa($account, $subscription, $dealer_id, $phone)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $consumer_secret = $account->mpesa_secret;
        $consumer_key = $account->mpesa_customer_key;
        $encodestring = base64_encode($consumer_key . ":" . $consumer_secret);
        $OuathString = 'Basic ' . $encodestring;

        $oauthURL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $oauthURL);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $encodestring)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        $json = json_decode($curl_response, true);

        $access_token = $json['access_token'];
        $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $timestamp = '30' . date("ymdhis");
        $password = base64_encode('174379' . $passkey . $timestamp);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $access_token)); //setting custom header
        $curl_post_data = array(
            'BusinessShortCode' => $account->mpesa_business_short_code,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => $account->mpesa_transaction_type,
            'Amount' => 1,
            'PartyA' => $phone,
            'PartyB' => '174379',
            'PhoneNumber' => $phone,
            'CallBackURL' => 'https://0d9e-41-80-112-131.ngrok-free.app/api/mpesa-callback',
            'AccountReference' => 'Automart AA Kenya',
            'TransactionDesc' => "Payment for " . $subscription->name . " subscription"
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
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
            return json_encode(['status' => 'success', 'checkoutid' => $data["CheckoutRequestID"], 'message' => $data["CustomerMessage"] . ". Check your phone and enter Mpesa pin to proceed."]);
        } else {
            return json_encode(['status' => 'error', 'message' => $data["errorMessage"]]);
        }
    }

    public function confirm($checkOutId, $trans_id, $phonenumber, $amount, $completed_at)
    {
        $payment = $this->where('crid', $checkOutId)->first();
        if (!is_null($payment)) {
            $payment->update(['trans_id' => $trans_id, 'phone'=>$phonenumber, 'amount'=>$amount, 'complete' => 1, 'completed_at' => $completed_at]);
        }
    }
}
