<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        $split = explode(" ", $this->name);
        $initials = substr($split[0], 0, 1) . substr($split[1], 0, 1);

        return $initials;
    }
}
