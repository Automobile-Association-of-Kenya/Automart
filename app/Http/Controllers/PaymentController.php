<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->payment = new Payment();
        $this->account = new Account();
        $this->subscription = new Subscription();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->subscription = new Subscription();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subscription = $this->subscription->find($request->subscription_id);
        $account = $this->account->getfortransaction("Mpesa",$request->subscription_id);
        if (is_null($account)) {
            return json_encode(['status'=>'error', 'message'=>"We are currently not accepting payments"]);
        }
        if ($request->type === "Mpesa") {
            return $this->payment->initiatempesa($account, $subscription,$request->dealer_id, $request->phonenumber);
        }
    }

    public function callback()
    {
        header("Access-Control-Allow-Origin: *");
        $data = file_get_contents('php://input');
        $json = json_decode($data);
        $Body = $json->Body;
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
            $phonenumber = $Item[3]->Value;
            $this->payment->confirm($checkOutId,$trans_id, $phonenumber,$amount,$completed_at);
        }
    }

    public function mpesaconfirm($MpesaReceiptNumber, $checkOutId)
    {
        $this->payment->confirm($MpesaReceiptNumber, $checkOutId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
