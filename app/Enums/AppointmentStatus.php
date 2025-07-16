<?php

namespace App\Enums;

enum AppointmentStatus: int
{
    case Scheduled = 1;
    case InProgress = 2;
    case Completed = 3;
    case Cancelled = 4;

    /**
     * Get all appointment status values.
     *
     * @return \Illuminate\Support\Collection<int, int>
     */
    public static function values()
    {
        return collect(self::cases())
                ->map(fn (self $status) => $status->value);
    }
}
