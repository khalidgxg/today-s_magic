<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Illuminate\Foundation\Http\FormRequest;

class VerificationPhoneNumberRequest extends FormRequest
{
    use FailedValidationsMessages;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_verified_code' => [
                'required',
                'max:6',
                'regex:/^[0-9]+$/'
            ],
        ];
    }

    public function messages()
    {
        return [
            'phone_verified_code.regex' => 'يجب ان يكون كود التحقق عداداً صحيحاً',
            'phone_verified_code.max' => 'يجب الا تتجاوز طول كود التحقق 6 رقماً',
        ];
    }
}
