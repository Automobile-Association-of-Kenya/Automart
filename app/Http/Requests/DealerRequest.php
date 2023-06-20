<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealerRequest extends FormRequest
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
            'name' => ['required','max:80'],
            'phone' => ['required','max:14','unique:dealers'],
            'email' => ['required','max:60','unique:dealers,email'],
            'address' => ['nullable','max:100'],
            'county_id' => ['nullable','max:20','exists:counties,id'],
            'city' => ['nullable','max:80'],

            'adminname' => ['nullable','max:80'],
            'adminphone' => ['nullable','max:16','unique:users,phone'],
            'adminemail' => ['nullable','max:60','unique:users,email'],
            'password' => ['nullable','min:6'],
        ];
    }
}
