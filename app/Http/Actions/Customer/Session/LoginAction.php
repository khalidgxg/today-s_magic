<?php

namespace App\Http\Actions\Customer\Session;

use App\Exceptions\CustomException\LogicException;
use App\Models\Customer;
use Carbon\Carbon;

class LoginAction
{
    public function __invoke($request)
    {
        $customer = Customer::where('email', strtolower($request->email))->with('activationToken', function ($activation_token_query) use ($request) {
            $activation_token_query->where('token', '=', $request->token);
        })->first();

        if (!password_verify($request->password, $customer->password)) {
            throw new LogicException(__('auth.failed'), 401, 'password');
        }

        if ($request->has('fcm_token')) {
            //remove $customer devices so he cannot receive new fcm notification in old devices
            $customer->devices()->updateOrCreate([
                'device_id' => $request->device_id,
                'fcm_token' => $request->fcm_token,
            ]);
        }

        if (!$customer->isAccountVerified()) {
            $email = $customer->email;
            throw new LogicException(__('auth.verify_email'), 301, 'email', ['customer_id' => $customer->id, 'email' => $email]);
        }

        $tokenResult = $customer->createToken("Customer Personal Access Token");
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addMonth();
        }
        $token->save();
        $customer['token'] = $tokenResult->accessToken;
        $customer['tokenResult'] = $tokenResult;

        return $customer;
    }


    private function verifyPassword($password, Customer $customer): bool
    {
        return password_verify($password, $customer->password);
    }
}
