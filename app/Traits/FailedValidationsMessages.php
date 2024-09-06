<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidationsMessages
{
    protected function failedValidation(Validator $validator)
    {
        $errors = collect($validator->errors())->map(function ($item) {return $item[0];});
        throw new HttpResponseException(
            sendError(__('messages.validations_error'), null, 422, $errors)
        );
    }

}
