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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => ['nullable', 'exists:vehicles,id'],
            'dealer_id' => ['nullable', 'exists:dealers,id'],
            'type_id' => ['nullable', 'exists:types,id'],
            'make_id' => ['required', 'exists:makes,id'],
            'vehicle_model_id' => ['required', 'exists:vehicle_models,id'],
            'country_of_origin' => ['nullable', 'exists:countries,id'],
            'country_located' => ['nullable', 'exists:countries,id'],
            // 'county_id' => ['nullable', 'exists:counties,id'],
            'shipping_to' => ['nullable'],
            'year' => ['required', 'max:10'],
            'price' => ['required', 'max:12'],
            'color' => ['nullable', 'max:30', 'string'],
            'mileage' => ['nullable', 'max:10', 'string'],
            'enginecc' => ['required', 'max:6'],
            'interior' => ['nullable', 'max:30', 'string'],
            'fuel_type' => ['nullable', 'max:30'],
            'transmission' => ['nullable', 'max:30', 'string'],
            'gear' => ['nullable', 'string', 'max:60'],
            'speed' => ['nullable', 'string', 'max:60'],
            'terrain' => ['nullable', 'string', 'max:60'],
            'engine' => ['nullable', 'string', 'max:60'],
            'horsepower' => ['nullable', 'string', 'max:60'],
            'description' => ['max:255', 'nullable', 'string'],
            'tags' => ['max:255', 'nullable', 'array'],
            'features' => ['nullable', 'array'],
            'seats' => ['nullable', 'max:20'],
            'location' => ['nullable', 'max:250'],
            'usage' => ['required','max:50']
        ];
    }
}
