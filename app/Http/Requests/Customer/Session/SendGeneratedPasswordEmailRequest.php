<?php

namespace App\Http\Requests\Customer\Session;

use App\Traits\FailedValidationsMessages;
use Illuminate\Foundation\Http\FormRequest;

class SendGeneratedPasswordEmailRequest extends FormRequest
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
            'password' => ['required'],
        ];
    }


}
