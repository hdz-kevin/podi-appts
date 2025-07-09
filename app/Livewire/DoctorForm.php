<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class DoctorForm extends Component
{
    // Model properties
    #[Validate('required', message: 'El nombre es obligatorio')]
    public string $name;
    #[Validate('required', message: 'Ingresa por lo menos un apellido')]
    public string $last_name;
    #[Validate('required', message: 'Elige una opción')]
    #[Validate('in:1,2', message: 'Opción no válida')] // 1,2: \App\Enums\Gender values
    public string $gender;

    public function render()
    {
        return view('livewire.doctor-form');
    }

    public function save()
    {
        $data = $this->validate();

        return "Saving...";
    }

    public function hideForm()
    {
        $this->dispatch('hideForm');
    }
}
