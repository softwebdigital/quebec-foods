<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BankRequest extends FormRequest
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
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => [
                'required',
                Rule::unique('bank_accounts', 'account_number')->where('user_id', auth()->id())->ignore(request()->route('bank'))
            ],
            'added_information' => ['sometimes']
        ];
    }

    public function messages(): array
    {
        return [
            'account_number.unique' => 'The account number already exist.'
        ];
    }
}
