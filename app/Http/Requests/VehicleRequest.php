<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'dealer_id'=>['nullable', 'exists:dealers,id'], 
            'type_id' => ['required', 'exists:types,id'],
            'make_id'=>['required','exists:makes,id'],
            'vehicle_model_id'=>['required', 'exists:vehicle_models,id'],
            'contry_of_origin' => ['nullable', 'exists:countries,id'], 
            'country_located'=>['nullable','exists:countries,id'],
            'county_id' => ['nullable', 'exists:counties,id'],
            'shipping_to'=>['nullable'],
            'year'=>['required','max:5','integer'],
            'price'=>['required', 'max:12', 'float'],
            'color'=>['required', 'max:30','string'],
            'miles'=>['required','max:10','string'],
            'enginecc'=>['required','max:6'],
            'interior'=>['required', 'max:30','string'],
            'fuel_type'=>['required','max:30'], 
            'transmission'=>['required','max:30','string'],
            'description'=>['max:255', 'nullable', 'string'], 
            'tags'=>['max:255', 'nullable', 'string']
        ];
    }
}
