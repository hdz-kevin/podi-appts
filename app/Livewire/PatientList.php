<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PatientList extends Component
{
    public Collection $patients;

    public function mount()
    {
        $this->patients = Auth::user()->patients;
    }

    public function render()
    {
        return view('livewire.patient-list');
    }
}
