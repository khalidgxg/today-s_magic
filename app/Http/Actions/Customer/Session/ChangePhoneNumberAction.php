<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Customer\Session\ChangePhoneNumberRequest;
use App\Mail\Customer\VerifyPhoneNumberMail;
use App\Models\Customer;

final class ChangePhoneNumberAction
{
    public function __invoke(ChangePhoneNumberRequest $request)
    {
        $customer = Customer::query()->findOrFail($request->customer_id);

        if ($customer->isAccountVerified()) {
            throw new LogicException(__('auth.already_verified'), 422);
        }

        sendVerificationPhoneCode($customer, $request->phone, new VerifyPhoneNumberMail($customer));

        return $customer->email;
    }
}
