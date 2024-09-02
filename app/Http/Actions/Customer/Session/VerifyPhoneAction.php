<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Models\Customer;
use Illuminate\Support\Carbon;

class VerifyPhoneAction
{
    public function __invoke($request)
    {
        $customer = Customer::query()->whereHas('verifyPhone', function ($phoneVerify) use ($request) {
            $phoneVerify->where('phone_verified_code', '=', $request->phone_verified_code);
        })->with('verifyPhone')->first();

        if (!$customer) {
            throw new LogicException(__('auth.invalid_otp'), 301);
        }

        $phoneVerify = $customer->verifyPhone;

        if (!$phoneVerify) {
            throw new LogicException(__('auth.invalid_otp'), 31);
        }

        if (Carbon::parse($phoneVerify->created_at)->addHours(24)->isPast()) {
            $phoneVerify->delete();
            throw new LogicException(__('auth.expired_otp'), 301);
        }

        $customer->update([
            'phone' => $phoneVerify->phone,
            'phone_verified_at' => Carbon::now(),
        ]);

        $phoneVerify->delete();

        return ['phone' => $customer['phone']];
    }
}
