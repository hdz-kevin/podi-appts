<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = \App\Models\Doctor::take(2)->get();

        $today = [
            [
                'start_time' => '08:30:00',
                'end_time' => '09:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '17:00:00',
                'end_time' => '18:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '08:00:00',
                'end_time' => '09:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '10:45:00',
                'end_time' => '12:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '12:30:00',
                'end_time' => '13:30:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '18:00:00',
                'end_time' => '19:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
        ];
        $tomorrow = [
            [
                'start_time' => '11:30:00',
                'end_time' => '12:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '13:00:00',
                'end_time' => '14:00:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '16:00:00',
                'end_time' => '17:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '08:00:00',
                'end_time' => '08:45:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '11:00:00',
                'end_time' => '12:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
        ];
        $yesterday = [
            [
                'start_time' => '08:30:00',
                'end_time' => '09:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '10:00:00',
                'end_time' => '11:00:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '12:00:00',
                'end_time' => '13:00:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '17:00:00',
                'end_time' => '18:30:00',
                'doctor_id' => $doctors[0]->id,
            ],
            [
                'start_time' => '08:00:00',
                'end_time' => '09:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '09:00:00',
                'end_time' => '10:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '12:30:00',
                'end_time' => '13:30:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
            [
                'start_time' => '18:00:00',
                'end_time' => '19:00:00',
                'doctor_id' => $doctors[1]->id,
            ],
        ];

        $appointments = collect($today)
                        ->map(fn ($appointment) => array_merge($appointment, [
                            'date' => now()->toDateString(),
                        ]))
                        ->merge(
                            collect($tomorrow)
                            ->map(fn ($appointment) => array_merge($appointment, [
                                'date' => now()->addDay()->toDateString(),
                            ]))
                        )
                        ->merge(
                            collect($yesterday)->map(fn ($appointment) => array_merge($appointment, [
                                'date' => now()->subDay()->toDateString(),
                            ]))
                        )
                        ->toArray();

        $user = User::first();

        foreach ($appointments as $appointment) {
            $appt = Appointment::factory()->create($appointment + ['user_id' => $user->id]);
            print_r("Created appointment for doctor ID {$appt->doctor_id} on {$appt->date}: {$appt->start_time} - {$appt->end_time}\n");
        }
    }
}
