<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PatientIndex extends Component
{
    use WithPagination;

    public bool $showForm;
    public ?int $editingPatientId = null;
    public string $search;

    public function mount()
    {
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
        $patients = Auth::user()->patients()->paginate(8);

        return view('livewire.patient-index', [
            'patients' => $patients,
        ]);
    }
}
