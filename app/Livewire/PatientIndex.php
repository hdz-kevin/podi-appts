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
     * Delete a patient by id.
     *
     * @param integer $patientId
     * @return void
     */
    public function delete(int $patientId)
    {
        $patient = Auth::user()->patients()->findOrFail($patientId);
        $patient->delete();

        $this->refreshPatients();
    }

    /**
     * Refresh the list of patients.
     *
     * @return void
     */
    #[On('refresh-patients')]
    public function refreshPatients()
    {
        $this->patients = Auth::user()->patients;
    }

    /**
     * Display the patient form for editing or creating a new patient.
     *
     * @param integer|null $editingPatientId
     * @return void
     */
    public function displayForm(?int $editingPatientId = null)
    {
        if ($editingPatientId !== null) {
            $this->editingPatientId = $editingPatientId;
        }

        $this->showForm = true;
    }

    /**
     * Hide patient form.
     *
     * @return void
     */
    #[On('hide-form')]
    public function hideForm()
    {
        if ($this->editingPatientId !== null) {
            $this->editingPatientId = null;
        }

        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.patient-index');
    }
}
