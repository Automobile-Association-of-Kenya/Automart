<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->account = new Account();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('accounts.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['account_id'=>'nullable','exists:accounts,id','provider' => 'nullable', 'pp_client_id' => 'nullable', 'pp_client_secret' => 'nullable', 'pp_business_name' => 'nullable', 'pp_card_number' => 'nullable', 'pp_expiry' => 'nullable', 'pp_cw' => 'nullable', 'mpesa_secret' => 'nullable', 'mpesa_customer_key' => 'nullable', 'mpesa_pass_key' => 'nullable', 'mpesa_business_short_code' => 'nullable', 'currency'=>'nullable|max:10', 'mpesa_transaction_type' => 'nullable']);
        if ($validated["account_id"] && !is_null($validated['account_id'])) {
            $account = $this->account->find($validated["account_id"]);
            $account->update($validated);
            $message = "Account updated successfully";
        } else {
            $this->account->create($validated);
            $message = "Account created successfully";
        }
        return json_encode(['status' => 'success', 'message' => $message]);
    }


    public function get()
    {
        $accounts = $this->account->withSum('payments', 'amount')->get();
        return json_encode($accounts);
    }

    public function subscribe(Request $request)
    {
        $account = $this->account->find($request->account_id);
        $account->subscription_id = $request->subscription_id;
        $account->update();
        return json_encode(['status'=>'success', 'message'=>'Account assigned to subscription successfully']);
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
