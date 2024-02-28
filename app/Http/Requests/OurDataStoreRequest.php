<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurDataStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'about_us' => ['required', 'max:255', 'string'],
            'privacy_policy' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'help_and_support' => ['required', 'max:255', 'string'],
        ];
    }
}
