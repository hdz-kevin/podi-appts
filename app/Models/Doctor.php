<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'gender',
        'user_id',
    ];

    /**
     * Get the doctor's full name.
     *
     * @return string
     */
    public function fullName(): string
    {
        return "{$this->name} {$this->last_name}";
    }

    /**
     * Get the user that owns the doctor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the initials of the doctor's name.
     *
     * @return string
     */
    public function initials(): string
    {
        $initials = collect(explode(" ", $this->fullName()))
            ->filter()
            ->take(2)
            ->map(fn (string $word) => $word[0])
            ->join('');

        return $initials;
    }

    protected $casts = [
        'gender' => \App\Enums\Gender::class,
    ];
}
