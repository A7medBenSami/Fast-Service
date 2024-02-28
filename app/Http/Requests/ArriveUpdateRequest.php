<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArriveUpdateRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'user_id' => ['required', 'exists:users,id'],
            'captain_id' => ['required', 'exists:captains,id'],
            'from_at' => ['required', 'numeric'],
            'from_long' => ['required', 'numeric'],
            'to_lat' => ['required', 'numeric'],
            'to_long' => ['required', 'numeric'],
            'note' => ['nullable', 'max:255', 'string'],
            'cost' => ['nullable', 'numeric'],
            'status' => ['required', 'in:upcoming,completed,cancelled'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'address' => ['nullable', 'max:255', 'string'],
            'location_id' => ['required', 'exists:locations,id'],
            'address_id' => ['nullable', 'exists:addresses,id'],
        ];
    }
}
