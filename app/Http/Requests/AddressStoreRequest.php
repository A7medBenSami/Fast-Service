<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'address' => ['required', 'max:255', 'string'],
            'street' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'district' => ['required', 'max:255', 'string'],
        ];
    }
}
