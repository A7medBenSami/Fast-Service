<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryUpdateRequest extends FormRequest
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
            'vehicle' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'max:255', 'string'],
            'captain_id' => ['required', 'max:255', 'string'],
            'from_lat' => ['required', 'max:255', 'string'],
            'from_long' => ['required', 'max:255', 'string'],
            'to_lat' => ['required', 'max:255', 'string'],
            'to_long' => ['required', 'max:255', 'string'],
            'status' => ['required', 'max:255', 'string'],
        ];
    }
}
