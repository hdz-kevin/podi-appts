<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DoctorForm extends Component
{   
    // Properties
    public ?int $editingDoctorId;

    // Model properties
    #[Validate('required', message: 'El nombre es obligatorio')]
    public string $name;
    #[Validate('required', message: 'Ingresa por lo menos un apellido')]
    public string $last_name;
    #[Validate('required', message: 'Elige una opción')]
    #[Validate('in:1,2', message: 'Opción no válida')] // 1,2: \App\Enums\Gender values
    public string $gender;

    /**
     * If an ID is provided, it will load the doctor's data for editing.
     *
     * @param integer|null $editingDoctorId
     * @return void
     */
    public function mount(?int $editingDoctorId)
    {
        if ($editingDoctorId !== null) {
            $this->editingDoctorId = $editingDoctorId;

            $doctor = Auth::user()->doctors()->findOrFail($editingDoctorId);
            $this->name = $doctor->name;
            $this->last_name = $doctor->last_name;
            $this->gender = $doctor->gender;
        }
    }

    /**
     * Save a doctor in the DB.
     *
     * @return void
     */
    public function save()
    {
        $data = $this->validate();

        Auth::user()->doctors()->create($data);

        $this->hideForm();
        $this->dispatch('refresh-doctors');
    }

    public function hideForm()
    {
        $this->dispatch('hide-form');
    }

    public function render()
    {
        return view('livewire.doctor-form');
    }
}
