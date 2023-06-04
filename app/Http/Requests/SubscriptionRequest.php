<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'subscription_id' => ['nullable', 'max:30', 'exists:subscriptions,id'],
            'name' => ['required', 'max:30'],
            'priority' => ['required', 'max:30'],
            'cost' => ['required', 'max:30'],
            'billingcycle' => ['required', 'max:30'],
            'properties' => ['nullable','array'],
            'description' => ['nullable','max:255'],
        ];
    }
}
