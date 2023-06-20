<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\LoanProduct;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->partner = new Partner();
        $this->user = new User();
        $this->loanproduct = new LoanProduct();
    }

    public function index()
    {
        return view('partners.index');
    }

    public function store(PartnerRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        $partner = $this->partner->create(['type' => $validated["type"], 'name' => $validated["name"], 'email' => $validated["email"], 'phone' => $validated["phone"], 'address' => $validated["address"]]);
        $user = $this->user->create(['partner_id' => $partner->id, 'name' => $validated['contactname'], 'email' => $validated['contactemail'], 'phone' => $validated['contactphone'], 'role' => $validated['role'], 'password' => Hash::make($validated["password"])]);
        DB::commit();
        new Registered($user);
        return json_encode(['status' => 'success', 'message' => "Partner account created successfully"]);
    }

    public function loans()
    {
        return view('partners.loans');
    }

    public function saveloanproduct(Request $request)
    {
        $loanproduct = $this->loanproduct->create(["partner_id" => auth()->user()->partner_id] + $request->all());
        return json_encode(['status' => 'success', 'message' => "Loan product created successfully"]);
    }

    public function loanproducts()
    {
        $loanproducts = $this->loanproduct->partnerloanproducts(auth()->user()->partner_id);
        return json_encode($loanproducts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function partnerloanproducts(string $id)
    {
        $loanproducts = $this->partnerloanproducts($id);
        return json_encode($loanproducts);
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
