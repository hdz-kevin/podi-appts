<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PatientList extends Component
{
    public Collection $patients;
    public bool $modal;

    public function mount()
    {
        $this->patients = Auth::user()->patients;
        $this->modal = false;
    }

    public function openModal(): void
    {
        $this->modal = true;
    }

    public function closeModal(): void
    {
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.patient-list');
    }
}
