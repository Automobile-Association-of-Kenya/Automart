<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaronsellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'country' => $this->country,
            'county' => $this->county,
            'make' => $this->carmake->car_make_name,
            'model' => $this->carmodel->car_model_name,
            'year' => $this->year,
            'price' => $this->price,
            'miles' => $this->miles,
            'vin' => $this->vin,
            'exterior' => $this->exterior,
            'interior' => $this->interior,
            'fuel_type' => $this->fuel_type,
            'features' => $this->features,
            'transmission' => $this->transmission,
            'vehicle_type' => $this->vehicle_type,
            'description' => $this->description,
            'images' => $this->images,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'carId' => $this->carId,
            'trans_id' => $this->trans_id,
            'package' => $this->package,
            'deal_slideshow' => $this->deal_slideshow,
            'created_at' => $this->created_at,
        ];
    }
}
