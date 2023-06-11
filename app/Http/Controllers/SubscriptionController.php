<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Models\Subsproperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->subscription = new Subscription();
        $this->subsprop = new Subsproperty();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = $this->subscription->with('properties:id,name')->orderBy('cost', 'ASC')->get();
        return json_encode($subscriptions);
    }

    /** Subscription Features */
    public function features()
    {
        $features = $this->subsprop->get();
        return json_encode($features);
    }

    public function plans()
    {
        $title = "Subscription Plans";
        return view('subscriptions.plans', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create($id)
    // {
    //     $plan = $this->subscription->with('properties')->find($id);
    //     if ($plan->cost <= 0) {
    //         // $subscription = $this->subscription->getDealerSubscription
    //         DB::table('dealer_subscription')->insert(['dealer_id' => auth()->user()->dealer_id, 'subscription_id' => $id,'status'=>'active']);
    //         return redirect()->route('dealers.index');
    //     } else {
    //         return view('subscriptions.create', compact('plan'));
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        if (!is_null($validated['subscription_id'])) {
            $subscription = $this->subscription->find($validated["subscription_id"]);
            $subscription->update($validated);
            $this->subscription->updateProperties($subscription->id, $validated["properties"]);
            $message = "Subscription updated successfully";
        } else {
            $subscription = $this->subscription->create($validated);
            $this->subscription->createProperties($subscription->id, $validated["properties"]);
            $message = "Subscription created successfully";
        }
        DB::commit();

        return json_encode(['status' => 'success', 'message' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscription = $this->subscription->with('properties')->find($id);
        return json_encode($subscription);
    }

    public function subscribe(Request $request)
    {

        return $request;
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

    public function createSubsProp(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);
        $subsprop = $this->subsprop->create($validated);
        return json_encode(['status' => 'success', 'property' => $subsprop, 'message' => 'Property added successfully']);
    }

    public function getSubsProperties()
    {
        $subsprops = $this->subsprop->get();
        return json_encode($subsprops);
    }
}
