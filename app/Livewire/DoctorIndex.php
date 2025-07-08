<?php

namespace App\Livewire;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DoctorIndex extends Component
{
    public Collection $doctors;

    public function mount()
    {
        $this->doctors = Doctor::all();
    }

    public function render()
    {
        return view('livewire.doctor-index');
    }
}
