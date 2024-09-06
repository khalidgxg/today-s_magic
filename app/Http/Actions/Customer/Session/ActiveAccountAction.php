<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Mail\Customer\CustomerCreatedAccountMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class ActiveAccountAction
{
    public function __invoke($request)
    {
        $customer = Customer::where('email', strtolower($request->email))->with(
            'activationToken',
            fn ($query) =>
            $query->where('token', '=', $request->token)
        )->first();

        if ($customer->isAccountActivated()) {
            throw new LogicException(__('auth.already_activated'), 422, 'email');
        }

        if (!$customer->activationToken) {
            throw new LogicException(__('auth.invalid_token'), 422, 'token');
        }

        if ($customer->activationToken->isExpire()) {
            throw new LogicException(__('auth.expired_token'), 422, 'token');
        }
        $customer->activateAccount();
        $customer->activationToken->delete();
        $data = $customer->only(['email']);

        Mail::to($customer->email)->send(new CustomerCreatedAccountMail($customer->refresh()));

        return $data;
    }
}
