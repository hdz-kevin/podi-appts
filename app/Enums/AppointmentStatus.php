<?php

namespace App\Enums;

enum AppointmentStatus: int
{
    case Scheduled = 1;
    case InProgress = 2;
    case Completed = 3;
    case Cancelled = 4;

    /**
     * Get the label for the appointment status.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::Scheduled => 'Programada',
            self::InProgress => 'En Curso',
            self::Completed => 'Completada',
            self::Cancelled => 'Cancelada',
        };
    }

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
