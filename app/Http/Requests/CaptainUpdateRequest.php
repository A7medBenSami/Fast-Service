<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CaptainUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'email' => [
                'required',
                Rule::unique('captains', 'email')->ignore($this->captain),
                'email',
            ],
            'password' => ['nullable'],
            'address' => ['required', 'max:255', 'string'],
            'vehicle_number' => [
                'required',
                Rule::unique('captains', 'vehicle_number')->ignore(
                    $this->captain
                ),
                'max:255',
                'string',
            ],
            'status' => ['required', 'in:active,inactive,in_hold'],
            'lat' => ['nullable', 'numeric'],
            'long' => ['nullable', 'numeric'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'image' => ['nullable', 'image', 'max:1024'],
            'phone' => [
                'required',
                Rule::unique('captains', 'phone')->ignore($this->captain),
                'max:255',
                'string',
            ],
            'otp' => [
                'required',
                Rule::unique('captains', 'otp')->ignore($this->captain),
                'max:255',
                'string',
            ],
            'isVerified' => ['required', 'numeric'],
            'gender' => ['required', 'in:male,female,other'],
            'dis_percentage' => ['nullable', 'numeric'],
            'license_image' => ['image', 'max:1024'],
            'vehicle_catalog_image' => ['image', 'max:1024'],
            'birth_certificate_image' => ['image', 'max:1024'],
        ];
    }
}