<?php

namespace App\Http\Controllers\API\Mobile;

use App\Http\Actions\Customer\Session\ActiveAccountAction;
use App\Http\Actions\Customer\Session\ChangePhoneNumberAction;
use App\Http\Actions\Customer\Session\ForgotPasswordAction;
use App\Http\Actions\Customer\Session\LoginAction;
use App\Http\Actions\Customer\Session\RegisterAction;
use App\Http\Actions\Customer\Session\ResendActivationAccountAction;
use App\Http\Actions\Customer\Session\ResendVerificationPhoneCodeAction;
use App\Http\Actions\Customer\Session\RestPasswordAction;
use App\Http\Actions\Customer\Session\VerifyPhoneAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Session\ActivateAccountRequest;
use App\Http\Requests\Customer\Session\ChangePhoneNumberRequest;
use App\Http\Requests\Customer\Session\ForgetPasswordRequest;
use App\Http\Requests\Customer\Session\LoginRequest;
use App\Http\Requests\Customer\Session\RegistrationRequest;
use App\Http\Requests\Customer\Session\ResendActivationRequest;
use App\Http\Requests\Customer\Session\ResendVerificationPhoneNumberRequest;
use App\Http\Requests\Customer\Session\ResetPasswordRequest;
use App\Http\Requests\Customer\Session\VerificationPhoneNumberRequest;
use App\Http\Resources\Customer\LoginResource;
use App\Http\Resources\Customer\SignupCustomerResource;
use Illuminate\Http\Request;
use LogicException;

class SessionController
{
    /**
     * @throws LogicException
     */
    public function register(RegistrationRequest $request)
    {
        $customer = (new RegisterAction())($request);

        return sendResponse(__('auth.success_register'), SignupCustomerResource::make($customer));
    }

    /**
     * @throws LogicException
     */
    public function activateAccount(ActivateAccountRequest $request)
    {
        $data = (new ActiveAccountAction())($request);
        return sendResponse(__('auth.email_verified'), $data, 200);
    }

    /**
     * @throws LogicException
     */
    public function login(LoginRequest $request)
    {
        $data = (new LoginAction())($request);
        return sendResponse(__('auth.success_login'), LoginResource::make($data), 200);
    }

    public function resendActivationAccount(ResendActivationRequest $request)
    {
        (new ResendActivationAccountAction())($request);

        return sendResponse(__('auth.check_account'));
    }

    /**
     * @throws LogicException
     */
    public function verifyPhone(VerificationPhoneNumberRequest $request)
    {
        $data = (new VerifyPhoneAction())($request);

        return sendResponse(__('auth.phone_verified'), $data, 200);
    }

    public function resendVerificationPhoneCode(ResendVerificationPhoneNumberRequest $request)
    {
        (new ResendVerificationPhoneCodeAction())($request);

        return sendResponse(__('auth.resend_verification_code'));
    }

    public function changePhoneNumber(ChangePhoneNumberRequest $request)
    {
        $email = (new ChangePhoneNumberAction())($request);

        return sendResponse(__('auth.resend_verification_code'), $email);
    }

    public function forgotPassword(ForgetPasswordRequest $request)
    {
        $customer = (new ForgotPasswordAction())($request);

        return sendResponse(__('passwords.sent'), $customer);
    }

    public function resetPassword(ResetPasswordRequest $request, $token)
    {
        (new RestPasswordAction())($request, $token);

        return sendResponse(__('passwords.reset'));
    }

    public function logout()
    {
        $customer = auth()->user();
        $customer->devices()->delete();

        $token = $customer->token();
        $token->revoke();

        return sendResponse(__('auth.logout'), null, 200);
    }
}
