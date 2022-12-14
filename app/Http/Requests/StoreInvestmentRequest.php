<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvestmentRequest extends FormRequest
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
            'package' => ['required', 'exists:packages,id'],
            'slots' => ['required', 'numeric', 'min:1', 'integer'],
            'payment' => ['required', 'in:card,wallet,deposit'],
            'gateway' => ['required_if:payment,card'],
            'currency' => ['required_if:payment,card', 'in:NGN,USD'],
            'rollover' => ['sometimes', 'boolean']
        ];
    }
}
