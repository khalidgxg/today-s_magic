<?php

namespace App\Traits;

use App\Models\VerifyPhone;
use Carbon\Carbon;

trait ActivateAccount
{
    public function isAccountActivated(): bool
    {
        return !is_null($this->email_verified_at);
    }
    public function isAccountVerified(): bool
    {
        return !is_null($this->phone_verified_at);
    }
    public function activateAccount()
    {
        $this->update([
            'email_verified_at' => Carbon::now(),
        ]);
    }
    public function verifyAccount()
    {
        $this->update([
            'phone_verified_at' => Carbon::now(),
        ]);
    }

    public function generatePhoneVerificationCode($phone): VerifyPhone
    {
        return $this->verifyPhone()->create([
            'phone' => $phone,
            'phone_verified_code' => generateOtp(),
        ]);
    }
}
