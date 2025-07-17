<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class AppointmentIndex extends Component
{
    public function render()
    {
        return view('livewire.appointment-index', [
            'appointments' => Doctor::first()->appointments,
        ]);
    }
}
