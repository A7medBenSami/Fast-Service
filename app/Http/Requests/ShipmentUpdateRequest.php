<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentUpdateRequest extends FormRequest
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
            'captain_id' => ['required', 'exists:captains,id'],
            'user_id' => ['required', 'exists:users,id'],
            'from_lat' => ['required', 'numeric'],
            'from_long' => ['required', 'numeric'],
            'to_lat' => ['required', 'numeric'],
            'to_long' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'cost' => ['nullable', 'numeric'],
            'status' => ['nullable', 'in:upcoming,completed,cancelled,receive'],
            'category_id' => ['required', 'exists:categories,id'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'address' => ['nullable', 'max:255', 'string'],
            'address_id' => ['nullable', 'exists:addresses,id'],
            'receiver_data_id' => ['required', 'exists:receiver_data,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'sender_data_id' => ['required', 'exists:sender_data,id'],
        ];
    }
}
