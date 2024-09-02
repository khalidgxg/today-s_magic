<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Http\Requests\Customer\Session\ResetPasswordRequest;
use App\Models\Customer;
use DB;

final class RestPasswordAction
{
    public function __invoke(ResetPasswordRequest $request, $token)
    {
        $restPassword = DB::table('password_resets')->where([['token', '=', $token], ['reset_type', '=', Customer::class]])->first();

        if (!$restPassword) {
            throw new LogicException(__('passwords.not_fount_token'), 422);
        }

        $customer = Customer::query()->where('email', $restPassword->email)->first();

        if (!$customer) {
            throw new LogicException(__('emails.not_found'), 422);
        }

        $customer->update($request->validated());

        $customer->resetPassword()->delete();
    }
}
