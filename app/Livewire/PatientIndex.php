<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PatientIndex extends Component
{
    public Collection $patients;
    public bool $showForm;
    public ?int $editingPatientId = null;
    public string $search;

    public function mount()
    {
        $this->patients = Auth::user()->patients;
        $this->showForm = false;
        $this->search = '';
    }

    /**
     * Update the list of patients based on the search query.
     *
     * @return void
     */
    public function updatedSearch()
    {
        $this->patients = Auth::user()
            ->patients()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('phone_number', 'like', '%' . $this->search . '%')
            ->get();
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

    public function displayForm(?int $patientEditingId = null)
    {
        if ($patientEditingId !== null) {
            $this->editingPatientId = $patientEditingId;
        }

        $this->showForm = true;
    }

    #[On('hideForm')]
    public function hideForm()
    {
        if ($this->editingPatientId !== null) {
            $this->editingPatientId = null;
        }

        $this->showForm = false;
    }

    /**
     * Delete a patient by ID.
     *
     * @param integer $patientId
     * @return void
     */
    public function delete(int $patientId)
    {
        $patient = Auth::user()->patients()->findOrFail($patientId);
        $patient->delete();

        $this->dispatch('refreshPatients');
    }

    public function render()
    {
        return view('livewire.patient-index');
    }
}
