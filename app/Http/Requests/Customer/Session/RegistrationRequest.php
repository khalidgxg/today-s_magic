<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'alpha_spaces', 'max:16', 'min:3'],
            'last_name' => ['required', 'string', 'alpha_spaces', 'max:16', 'min:3'],
            'email' => ['required', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'string', 'email', 'max:64', 'min:3', 'unique:customers'],
            'password' => ['required', 'min:8', 'max:32', 'confirmed', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\S]+$/'],
           // 'residence_place' => ['required', 'string', 'min:3', 'max:32'],
            'gender' => ['required', 'in:FEMALE,MALE'],
            'birth_date' => ['required', 'date', 'date_format:Y-m-d', 'after:1900-1-1', 'before:' . Carbon::now()->subYears(18)->format('Y-m-d')],
//            'phone' => ['required', 'regex:/^[0-9]+$/', 'min:7', 'max:15',
//                Rule::unique("customers", 'phone')->whereNot('phone', "00000000001"),
//                Rule::unique("verify_phones", 'phone')->whereNot('phone', "00000000001"),
//                new ValidPhoneNumber($this->country_id)],
            'country_id' => ['required', 'exists:countries,id', 'uuid'],
            'national_id' => ['required','exists:countries,id', 'uuid'],

            'accept_terms' => ['required', 'in:true'],
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'يجب ان يكون رقم الهاتف عداداً صحيحاً',
            'phone.min' => 'يجب ان يكون  طول رقم الهاتف مساوياً او اكبر من 7 رقماً',
            'phone.max' => 'يجب أن لا يتجاوز طول رقم الهاتف 15 رقماً',
            'birth_date.before' => 'يجب ان يكون عمرك اكبر من ثمانية عشر سنةً',
            'residence_place.max' => 'يجب أن لا يتجاوز طول النص مكان الإقامة 32 حرفاً.ً',
        ];
    }
}
