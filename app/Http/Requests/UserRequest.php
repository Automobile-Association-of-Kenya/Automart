<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:16', 'unique:' . User::class],
            'alt_phone' => ['nullable', 'string', 'max:18'],
            'profile' => ['file','nullable','max:200']
        ];
    }
}
