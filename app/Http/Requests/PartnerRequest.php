<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'type' => ['required'],
            'name' => ['required', 'max:80'],
            'phone' => ['required', 'max:16', 'unique:partners,phone'],
            'email' => ['required', 'unique:partners,email'],
            'address' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
            'contactname' => ['required', 'max:80'],
            'contactemail' => ['required', 'max:100', 'unique:users,email'],
            'contactphone' => ['required', 'max:16', 'unique:users,phone'],
        ];
    }
}
