<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'exists:customers,email'],
            'password' => ['required','min:8', 'max:32', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\S]+$/'],
            'accept_terms' => ['in:true'],
            'fcm_token' => ['string', 'max:250'],
            'device_id' => ['required_with:fcm_token', 'string', 'max:100'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.regex' => __('validation.password_regex_not_valid'),
            'password.min' => 'يجب أن يكون طول النص على الأقل 8 أحرف',
            'password.max' => 'يجب ألّا يتجاوز طول النص 32 حرفاً',
        ];
    }
}
