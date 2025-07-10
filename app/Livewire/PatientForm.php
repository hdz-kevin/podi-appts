<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PatientForm extends Component
{
    // Properties
    public ?int $editingPatientId = null;

    // Model properties
    #[Validate('required', message: 'El nombre es obligatorio')]
    public string $name = '';

    #[Validate('required', message: 'El número de teléfono es obligatorio')]
    #[Validate('numeric', message: 'El número de teléfono es invalido')]
    #[Validate('digits:10', message: 'El número de teléfono debe tener 10 dígitos')]
    public string $phone_number = '';

    #[Validate('nullable')]
    public ?string $address = null;

    /**
     * If an ID is provided, it will load the patient's data for editing.
     *
     * @param integer|null $editingPatientId
     * @return void
     */
    public function mount(?int $editingPatientId)
    {
        if ($editingPatientId !== null) {
            $this->editingPatientId = $editingPatientId;

            $patient = Auth::user()->patients()->findOrFail($editingPatientId);
            $this->name = $patient->name;
            $this->phone_number = $patient->phone_number;
            $this->address = $patient->address;
        }
    }

    /**
     * Save the patient data.
     * If $editingPatientId property is set, it updates the existing patient.
     * Otherwise, it creates a new patient.
     *
     * @return void
     */
    public function save()
    {
        if ($this->address === '') $this->address = null;
        $data = $this->validate();

        if ($this->editingPatientId !== null) {
            $patient = Auth::user()->patients()->findOrFail($this->editingPatientId);
            $patient->update($data);
            $this->editingPatientId = null;
        } else {
            Auth::user()->patients()->create($data);
        }

        $this->hideForm();
        $this->dispatch('refreshPatients');
    }

    public function hideForm()
    {
        $this->dispatch('hideForm');
    }

    public function render()
    {
        return view('livewire.patient-form');
    }
}
