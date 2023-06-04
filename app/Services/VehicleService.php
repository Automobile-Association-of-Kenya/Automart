<?php

namespace App\Service;

use App\Models\Vehicle;
use App\Models\VehiclePrice;

class VehicleSevice
{
    public $vehicle;
    public $price;

    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->price = new VehiclePrice();
    }

    public function discountedVehicles()
    {
        $vehicles = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                $type->select('id', 'type');
            }, 'make' => function ($make) {
                $make->select('id', 'make');
            }, 'model' => function ($model) {
                $model->select('id', 'model');
            }])->get();
        $discountedvehicles = [];
        foreach ($vehicles as $key => $value) {
            $prices = $this->price->where('vehicle_id', $value->id)->latest()->get();
            if (!empty($prices) && $prices->count() > 1) {
                $first = $prices->first();
                $last = $prices[1];
                if ($first->price < $last->price) {
                    $object = [
                        'id' => $value->id, 'vehicle_no' => $value->vehicle_no,
                        'shipping_to' => $value->shipping_to,
                        'year' => $value->year,
                        'price' => $value->price,
                        'location' => $value->location,
                        'color' => $value->color,
                        'mileage' => $value->mileage,
                        'enginecc' => $value->enginecc,
                        'interior' => $value->interior,
                        'fuel_type' => $value->fuel_type,
                        'transmission' => $value->transmission,
                        'description' => $value->description,
                        'current_price' => $first->price,
                        'initial_price' => $last->price,
                        'model' => $value->model, 'make' => $value->make, 'dealer' => $value->dealer, 'type' => $value->type
                    ];
                    array_push($discountedvehicles, $object);
                }
            }
        }
        return $discountedvehicles;
    }
}

?>
