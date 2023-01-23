<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepositRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'amount' => ['required', 'numeric'],
            'payment' => ['required', 'in:card,deposit'],
            'gateway' => ['required_if:payment,card'],
            'currency' => ['required_if:payment,card', 'in:NGN,USD']
        ];
    }
}
