<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait TokenActivation
{
    public static function generateTokenVerificationCode($tokenable)
    {
        return self::query()->Create([
            'token' => Str::random(60),
            'tokenable_id' => $tokenable->id,
            'tokenable_type' => get_class($tokenable),
        ]);
    }
    public function isExpire(): bool
    {
        return Carbon::parse($this->created_at)->addHours(24)->isPast();
    }
}
