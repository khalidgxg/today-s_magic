<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Customer\Session\ForgetPasswordRequest;
use App\Models\Customer;
use App\Notifications\Customer\Session\ForgotPasswordNotification;

final class ForgotPasswordAction
{
    public function __invoke(ForgetPasswordRequest $request)
    {
        $customer = Customer::query()->where('email', $request->email)->first();

        if (!$customer) {
            throw new LogicException(__('emails.not_found'), 422);
        }

        $customer->resetPassword()->delete();

        $customer->resetPassword()->create([]);

        $customer->notify(new ForgotPasswordNotification());

        return $request->email;
    }
}
