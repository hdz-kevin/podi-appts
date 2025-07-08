<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'gender' => Gender::Male->value,
                'name' => 'Luis',
                'last_name' => 'Hernandez',
                'user_id' => 1,
            ],
            [
                'gender' => Gender::Male->value,
                'name' => 'Felipe',
                'last_name' => 'Zamora Duran',
                'user_id' => 1,
            ],
            [
                'gender' => Gender::Female->value,
                'name' => 'Betty',
                'last_name' => 'Martinez',
                'user_id' => 1,
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
