<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->payment = new Payment();
        $this->account = new Account();
        $this->subscription = new Subscription();
    }

    public function store(Request $request)
    {

        $subscription = $this->subscription->find($request->subscription_id);
        $account = $this->account->getfortransaction($request->type,$request->subscription_id);
        if (is_null($account)) {
            return json_encode(['status'=>'error', 'message'=>"We are currently not accepting payments"]);
        }
        if ($request->type === "Mpesa") {
            return $this->payment->initiatempesa($account, $subscription,$request->dealer_id, $request->phonenumber);
        }else {
            return $this->payment->initiatepaypal($account,$subscription);
        }
    }

    public function callback()
    {
        header("Access-Control-Allow-Origin: *");
        $data = file_get_contents('php://input');
        $json = json_decode($data);
        $Body = $json->Body;
        Log::notice($data);
        $stkCallback = $Body->stkCallback;
        $ResultCode = $stkCallback->ResultCode;
        if ($ResultCode != 0) {
            Log::info(json_encode(['status' => 'error', 'message' => $Body->errorMessage]));
        } else {
            Log::info(json_encode($Body));
            $checkOutId = $stkCallback->CheckoutRequestID;
            $CallbackMetadata = $stkCallback->CallbackMetadata;
            $Item = $CallbackMetadata->Item;
            $amount = $Item[0]->Value;
            $trans_id = $Item[1]->Value;
            $completed_at = $Item[2]->Value;
            $phonenumber = $Item[3]?->Value;
            $this->mpesaconfirm($checkOutId,$trans_id, $phonenumber,$amount,$completed_at);
        }
    }

    public function mpesaconfirm($checkOutId,$trans_id, $phonenumber,$amount,$completed_at)
    {
        $this->payment->confirm($checkOutId, $trans_id, $phonenumber, $amount, $completed_at);
    }

    public function paymentconfirm($checkOutId)
    {
        $payment = $this->payment->where('crid',$checkOutId)->first();
        if ($payment->complete == 1 && !is_null($payment->trans_id)) {
            $this->subscription->subscribe($payment);
        }
        return json_encode($payment);
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return json_encode(['status'=>'success', 'message'=>$response["message"], 'response'=>$response]);
        } else {
            return json_encode(['status' => 'error', 'message' => $response["message"]  ?? 'Something went wrong', 'response' => $response]);
        }
    }

    function get(Request $request)
    {
        $query = $this->payment->query();
        $query->where('complete',1);
        if (!is_null($request->dealer_id)) {
            $query->where('dealer_id', $request->dealer_id);
        }
        if (!is_null($request->account_id)) {
            $query->where('account_id', $request->account_id);
        }
        if (!is_null($request->start_date)) {
            $query->where('created_at','>=', $request->start_date);
        }
        if (!is_null($request->end_date)) {
            $query->where('created_at', '<=', $request->end_date);
        }
        $payments = $query->with('subscription:id,name','user:id,name', 'dealer:id,name', 'account:id,provider,mpesa_business_short_code')->latest()->get();
        return json_encode($payments);
    }

}
