<?php

namespace App\Traits;

trait CreateJobSchedule
{
    protected static function createScheduleJob($type, $executes_at, $payload = null)
    {
        self::query()->create([
            'type' => $type,
            'executes_at' => $executes_at,
            'payload' => $payload,
        ]);
    }

    protected static function deleteScheduleJobBySessionId($session_id)
    {
        self::query()->where('payload->session_id', $session_id)?->forceDelete();
    }
}
