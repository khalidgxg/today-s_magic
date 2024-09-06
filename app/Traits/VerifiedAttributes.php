<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait VerifiedAttributes
{
    public function isEmailVerified(): Attribute
    {
        return Attribute::make(get: fn () => is_null($this->email_verified_at) ? false : true);
    }

    public function isPhoneVerified(): Attribute
    {
        return Attribute::make(get: fn () => is_null($this->phone_verified_at) ? false : true);
    }
}
