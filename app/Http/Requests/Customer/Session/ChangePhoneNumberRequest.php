<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangePhoneNumberRequest extends FormRequest
{
    use FailedValidationsMessages;

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
            'customer_id' => [
                'required',
                'exists:customers,id',
                'uuid',
            ],
            'phone' => [
                'required',
                'min:7',
                'regex:/^[0-9]+$/',
                'max:15',
                Rule::unique('customers', 'phone'),
            ]
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'يجب ان يكون رقم الهاتف عداداً صحيحاً',
            'phone.min' => 'يجب ان يكون  طول رقم الهاتف مساوياً او اكبر من 7 رقماً',
            'phone.max' => 'يجب أن لا يتجاوز طول رقم الهاتف 15 رقماً',
        ];
    }
}
