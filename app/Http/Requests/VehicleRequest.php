<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','max:255'],
            'country' => ['required','max:255'],
            'county' => ['required','max:255'],
            'make' => ['required','max:255'],
            'model' => ['required','max:255'],
            'year' => ['required','max:255'],
            'price' => ['required','max:255'],
            'miles' => ['required','max:255'],
            'enginecc' => ['required','max:255'],
            'exterior' => ['required','max:255'],
            'interior' => ['required','max:255'],
            'fuel_type' => ['required','max:255'],
            'features' => ['required'],
            'transmission' => ['required','max:255'],
            'vehicle_type' => ['nullable','max:255'],
            'description' => ['required',],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'usage' => ['required','max:255'],
            'trans_id' => ['nullable','max:255'],
            'package' => ['nullable','max:255'],
            'deal_slideshow' => ['nullable','max:255'],
        ];
    }
}
