<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'phone_code' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'nk_name' => ['required'],
            'nk_phone' => ['required'],
            'nk_address' => ['required'],
        ];
    }
}
