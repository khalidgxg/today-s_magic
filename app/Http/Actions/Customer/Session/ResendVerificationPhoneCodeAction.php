<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Customer\Session\ResendVerificationPhoneNumberRequest;
use App\Mail\Customer\VerifyPhoneNumberMail;
use App\Models\Customer;
use Carbon\Carbon;

final class ResendVerificationPhoneCodeAction
{
    public function __invoke(ResendVerificationPhoneNumberRequest $request)
    {
        $customer = Customer::query()->findOrFail($request->customer_id);

        if (!$customer) {
            throw new LogicException(__('emails.not_found'), 403);
        }

        if ($customer->isAccountVerified()) {
            throw new LogicException(__('auth.already_verified'), 403);
        }

        $verifyPhone = $customer->verifyPhone;

        if (!Carbon::parse($verifyPhone->created_at)->addMinutes(3)->isPast()) {
            throw new LogicException(__('auth.email_already_sent'), 403);

        }
        sendVerificationPhoneCode($customer, $verifyPhone->phone, new VerifyPhoneNumberMail($customer->refresh()));
    }
}
