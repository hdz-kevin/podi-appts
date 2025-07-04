<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'address',
        'user_id',
    ];

    /**
     * Get the user that owns the patient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the initials of the patient's name.
     *
     * @return string
     */
    public function initials(): string
    {
        $initials = collect(explode(" ", $this->name))
            ->filter()
            ->take(2)
            ->map(fn (string $word) => $word[0])
            ->join('');

        return $initials;
    }
}
