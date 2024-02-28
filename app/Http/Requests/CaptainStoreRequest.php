<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CaptainStoreRequest extends FormRequest
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
            'email' => ['required', 'unique:captains,email', 'email'],
            'password' => ['required'],
            'address' => ['required', 'max:255', 'string'],
            'vehicle_number' => [
                'required',
                'unique:captains,vehicle_number',
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
                'unique:captains,phone',
                'max:255',
                'string',
            ],
            'otp' => ['required', 'unique:captains,otp', 'max:255', 'string'],
            'isVerified' => ['required', 'numeric'],
            'gender' => ['required', 'in:male,female,other'],
            'dis_percentage' => ['nullable', 'numeric'],
            'license_image' => ['image', 'max:1024'],
            'vehicle_catalog_image' => ['image', 'max:1024'],
            'birth_certificate_image' => ['image', 'max:1024'],
        ];
    }
}