<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'max:32',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\S]+$/',

            ]
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => __('validation.password_regex_not_valid'),
        ];
    }
}
