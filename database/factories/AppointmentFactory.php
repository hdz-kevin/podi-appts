<?php

namespace Database\Factories;

use App\Enums\AppointmentStatus;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctorIds = Doctor::all()->map(fn ($doctor) => $doctor->id)->toArray();
        $patientIds = Patient::all()->map(fn ($patient) => $patient->id)->toArray();

        return [
            'doctor_id' => $this->faker->randomElement($doctorIds),
            'patient_id' => $this->faker->randomElement($patientIds),
            'status' => function (array $attributes) {
                $now = Carbon::now();
                $startDateTime = Carbon::parse($attributes['date'].' '.$attributes['start_time']);
                $endDateTime = Carbon::parse($attributes['date'].' '.$attributes['end_time']);

                return match (true) {
                    $now > $startDateTime && $now < $endDateTime => AppointmentStatus::InProgress->value,
                    $now < $startDateTime => AppointmentStatus::Scheduled->value,
                    $now > $endDateTime => AppointmentStatus::Completed->value,
                };
            },
            'is_at_home' => $this->faker->boolean(20),
            'address' => fn (array $attributes) => $attributes['is_at_home'] ? $this->faker->address : null,
            'notes' => $this->faker->optional(0.2)->text(),
        ];
    }
}
