<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PatientList extends Component
{
    public Collection $patients;
    public bool $showForm;

    public function mount()
    {
        $this->patients = Auth::user()->patients;
        $this->showForm = false;
    }

    public function displayForm()
    {
        $this->showForm = true;
    }

    #[On('hideForm')]
    public function hideForm()
    {
        $this->showForm = false;
    }

    /**
     * Refresh the list of patients.
     *
     * @return void
     */
    #[On('refreshPatients')]
    public function refreshPatients()
    {
        $this->patients = Auth::user()->patients;
    }

    public function render()
    {
        return view('livewire.patient-list');
    }
}
