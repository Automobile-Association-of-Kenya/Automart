<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->service = new Services();
    }

    public function services($id = null)
    {
        $query = $this->service->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $services = $query->select('id', 'service', 'description', 'caret')->get();

        return json_encode($services);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['nullable', 'exists:services,id'],
            'service' => ['required', 'max:70', 'unique:services,service,'.$request->service_id],
            'description' => ['required', 'max:255'],
            'caret' => ['nullable', 'max:50']
        ]);
        if (is_null($validated["service_id"])) {
            $this->service->create($validated);
            $message = "Service updated successfully";
        } else {
            $service = $this->service->find($validated["service_id"]);
            $service->update($validated);
            $message = "Service updated successfully";
        }

        return json_encode(['status' => 'success', 'message' => $message]);
    }
}
