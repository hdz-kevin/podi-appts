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
     * Reset pagination when the search input changes.
     * This ensures that the search results start from the first page.
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
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
        $query = Auth::user()->patients();

        // Todo: Searcher only working on first page
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('phone_number', 'like', '%'.$this->search.'%');
            });
        }

        $patients = $query->paginate(8);

        return view('livewire.patient-index', [
            'patients' => $patients,
        ]);
    }
}
