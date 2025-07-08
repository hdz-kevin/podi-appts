<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 1;
    case Female = 2;

    /**
     * Get the label for the gender.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::Male => 'Masculino',
            self::Female => 'Femenino',
        };
    }

    /**
     * Get all gender values.
     *
     * @return \Illuminate\Support\Collection<int, int>
     */
    public static function values()
    {
        return collect(self::cases())
                ->map(fn (self $gender) => $gender->value);
    }
}
