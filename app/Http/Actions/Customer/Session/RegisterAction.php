<?php

namespace App\Http\Actions\Customer\Session;

use App\Enums\Admin\Roles\RoleTypesEnum;
use App\Mail\Customer\ActivateAccountMail;
use App\Mail\Customer\VerifyPhoneNumberMail;
use App\Models\ActivationToken;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class RegisterAction
{
    public function __invoke($request)
    {
        $input = $request->only((new Customer())->getFillable());

        if ($request->has('phone')) {

            unset($input['phone']);
        }

        $customer = Customer::create($input);

        ActivationToken::generateTokenVerificationCode($customer);
        Mail::to($customer->email)->send(new ActivateAccountMail($customer->refresh()));
        $customer->generatePhoneVerificationCode($request->phone);
        Mail::to($customer->email)->send(new VerifyPhoneNumberMail($customer->refresh()));
        //        SendVerificationCodeSMSJob::dispatch($customer);

        $customer->assignRole(RoleTypesEnum::CUSTOMER);

        return $customer;
    }
}
