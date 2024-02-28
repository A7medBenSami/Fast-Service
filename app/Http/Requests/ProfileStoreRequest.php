<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'user_id' => ['nullable', 'exists:users,id'],
            'captain_id' => ['nullable', 'exists:captains,id'],
            'full_name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'street' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'district' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }
}
