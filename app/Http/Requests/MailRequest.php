<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'mail_id' => ['nullable', 'exists:maillists,id'],
            'usage' => ['max:60','required', 'string'],
            'host' => ['max:60','required', 'string'],
            'address' => ['max:60','required', 'string'],
            'password' => ['max:60','required', 'string'],
            'protocol' => ['max:20','required', 'string'],
            'port' => ['max:7','required', 'string'],
            'status' => ['max:60','required', 'string'],
        ];
    }
}
