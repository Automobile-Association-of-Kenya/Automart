<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Models\Subsproperty;
use App\Models\Visit;
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
        $properties = $this->subsprop->get();
        $propids = $this->subsprop->pluck('id');
        $subscriptions = $this->subscription->with('properties:id,name')->get();
        $data = ['properties'=>$properties, 'subscriptions'=> $subscriptions, 'propids'=> $propids];
        return json_encode($data);
    }

    /** Subscription Features */
    public function features()
    {
        $features = $this->subsprop->get();
        return json_encode($features);
    }

    public function plans()
    {
        Visit::visit(request()->server());
        $title = "Subscription Plans";
        $properties = Subsproperty::get();

        // return $this->subscription->packages();
        // dd($subscriptions);
        return view('subscriptions.index', compact('title','properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        Visit::visit(request()->server());
        $plan = $this->subscription->with('properties')->find($id);
        if ($plan->cost <= 0) {
            $this->subscription->subscribe(auth()->user(), $plan->id);
            return redirect()->route('dealers.index');
        } else {
            return view('subscriptions.create', compact('plan'));
        }
    }

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

    public function show(string $id)
    {
        $subscription = $this->subscription->with('properties')->find($id);
        return json_encode($subscription);
    }

    public function subscribe(Request $request)
    {
        return $request;
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
