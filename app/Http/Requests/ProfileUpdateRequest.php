<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            // Name
            'name' => [
                'required', 
                'string', 
                'max:255',
                'regex:/^[a-zA-Z\s]+$/',
            ],

            // Email
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],

            // Username
            'username' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique(User::class)->ignore($this->user()->id), 
            ],

            // Phone Number
            'phone_number' => ['nullable', 'string', 'max:14', 'regex:/^[0-9\s\+\-\(\)]+$/'],

            // Address
            'address' => ['nullable', 'string', 'max:255'],

            // Gender
            'gender' => ['nullable', Rule::in(['Male', 'Female'])],

            // Profile Image
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ];
    }
}
