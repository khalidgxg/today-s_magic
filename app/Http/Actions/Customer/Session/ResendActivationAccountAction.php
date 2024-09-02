<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Customer\Session\ResendActivationRequest;
use App\Mail\Customer\ActivateAccountMail;
use App\Models\ActivationToken;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

final class ResendActivationAccountAction
{
    public function __invoke(ResendActivationRequest $request)
    {
        $customer = Customer::where('email', strtolower($request->email))->firstOrFail();

        if ($customer->isAccountActivated()) {
            throw new LogicException(__('auth.already_activated'), 403);
        }

        if (!Carbon::parse($customer->activationToken->created_at)->addMinutes(3)->isPast()) {
            throw new LogicException(__('auth.email_already_sent'), 403);

        }

        if (isset($customer->activationToken)) {
            $customer->activationToken->delete();
        }
        ActivationToken::generateTokenVerificationCode($customer);
        Mail::to($customer->email)->send(new ActivateAccountMail($customer->refresh()));

    }
}
